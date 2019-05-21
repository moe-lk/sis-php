<?php

use Cake\Utility\Text;
use Cake\ORM\TableRegistry;
use Phinx\Migration\AbstractMigration;

class POCOR2454 extends AbstractMigration
{
    private $admissionModelId = 16;
    private $incomingTransferModelId = 17;
    private $outgoingTransferModelId = 18;

    // commit
    public function up()
    {
        // workflow_models
        $studentAdmission = $this->table('institution_student_admission', [
            'collation' => 'utf8mb4_unicode_ci',
            'comment' => 'This table contains all the student admission requests'
        ]);
        $studentAdmission
            ->addColumn('start_date', 'date', [
                'default' => null,
                'null' => false
            ])
            ->addColumn('end_date', 'date', [
                'default' => null,
                'null' => false
            ])
            ->addColumn('student_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
                'comment' => 'links to security_users.id'
            ])
            ->addColumn('status_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
                'comment' => 'links to workflow_steps.id'
            ])
            ->addColumn('assignee_id', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
                'comment' => 'links to security_users.id'
            ])
            ->addColumn('institution_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
                'comment' => 'links to institutions.id'
            ])
            ->addColumn('academic_period_id', 'integer', [
                'limit' => 11,
                'null' => false,
                'comment' => 'links to academic_periods.id'
            ])
            ->addColumn('education_grade_id', 'integer', [
                'limit' => 11,
                'null' => false,
                'comment' => 'links to education_grades.id'
            ])
            ->addColumn('institution_class_id', 'integer', [
                'limit' => 11,
                'null' => true,
                'comment' => 'links to institution_classes.id'
            ])
            ->addColumn('comment', 'text', [
                'default' => null,
                'null' => true
            ])
            ->addColumn('modified_user_id', 'integer', [
                'limit' => 11,
                'null' => true,
                'default' => null,
                'comment' => 'links to security_users.id'
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => true
            ])
            ->addColumn('created_user_id', 'integer', [
                'limit' => 11,
                'null' => false,
                'comment' => 'links to security_users.id'
            ])
            ->addColumn('created', 'datetime', [
                'null' => false
            ])
            ->addIndex('student_id')
            ->addIndex('status_id')
            ->addIndex('assignee_id')
            ->addIndex('institution_id')
            ->addIndex('academic_period_id')
            ->addIndex('education_grade_id')
            ->addIndex('institution_class_id')
            ->addIndex('modified_user_id')
            ->addIndex('created_user_id')
            ->save();

    }

    // rollback
    public function down()
    {
        // drop new institution_student_admission
        $this->dropTable('institution_student_admission');

        // drop institution_student_transfers
        $this->dropTable('institution_student_transfers');

        // rename z_2454_institution_student_admission
        $this->table('z_2454_institution_student_admission')->rename('institution_student_admission');

        $workflowModelsToDelete = [$this->admissionModelId, $this->incomingTransferModelId, $this->outgoingTransferModelId];
        foreach ($workflowModelsToDelete as $modelId) {
            $this->cascadeDeleteWorkflowModel($modelId);
        }

        // revert security_functions
        $studentAdmissionSql = "UPDATE security_functions
                                SET `name` = 'Student Admission',
                                `_view` = 'StudentAdmission.index|StudentAdmission.view',
                                `_edit` = null,
                                `_add` = null,
                                `_delete` = null,
                                `_execute` = 'StudentAdmission.edit|StudentAdmission.view|StudentAdmission.execute'
                                WHERE `id` = 1028";

        $studentTransferInSql = "UPDATE security_functions
                                SET `name` = 'Transfer Request',
                                `_view` = 'TransferRequests.index|TransferRequests.view',
                                `_edit` = null,
                                `_add` = null,
                                `_delete` = 'TransferRequests.remove',
                                `_execute` = 'TransferRequests.add|TransferRequests.edit|Transfer.add'
                                WHERE `id` = 1022";

        $studentTransferOutSql = "UPDATE security_functions
                                SET `name` = 'Transfer Approval',
                                `_view` = 'TransferApprovals.view',
                                `_edit` = null,
                                `_add` = null,
                                `_delete` = null,
                                `_execute` = 'TransferApprovals.edit|TransferApprovals.view'
                                WHERE `id` = 1023";

        $this->execute($studentAdmissionSql);
        $this->execute($studentTransferInSql);
        $this->execute($studentTransferOutSql);
    }

    public function cascadeDeleteWorkflowModel($workflowModelId)
    {
        $WorkflowsTable = TableRegistry::get('Workflow.Workflows');

        // delete workflow_models
        $this->execute("DELETE FROM `workflow_models` WHERE `id` = " . $workflowModelId);

        // delete workflows
        $workflowId = $WorkflowsTable->find()
            ->where([$WorkflowsTable->aliasField('workflow_model_id') => $workflowModelId])
            ->extract('id')
            ->first();
        $this->execute("DELETE FROM `workflows` WHERE `id` = " . $workflowId);

        // delete workflow_actions
        $this->execute("DELETE FROM `workflow_actions` WHERE `workflow_actions`.`workflow_step_id` IN (
                SELECT `id` FROM `workflow_steps` WHERE `workflow_id` = " . $workflowId . "
            )");

        // delete workflow_steps_roles
        $this->execute("DELETE FROM `workflow_steps_roles` WHERE `workflow_steps_roles`.`workflow_step_id` IN (
                SELECT `id` FROM `workflow_steps` WHERE `workflow_id` = " . $workflowId . "
            )");

        // delete workflow_steps_params
        $this->execute("DELETE FROM `workflow_steps_params` WHERE `workflow_steps_params`.`workflow_step_id` IN (
                SELECT `id` FROM `workflow_steps` WHERE `workflow_id` = " . $workflowId . "
            )");

        // delete workflow_statuses_steps
        $this->execute("DELETE FROM `workflow_statuses_steps` WHERE `workflow_statuses_steps`.`workflow_step_id` IN (
                SELECT `id` FROM `workflow_steps` WHERE `workflow_id` = " . $workflowId . "
            )");

        // delete workflow_steps
        $this->execute("DELETE FROM `workflow_steps` WHERE `workflow_id` = " . $workflowId);

        // delete workflow_statuses
        $this->execute("DELETE FROM `workflow_statuses` WHERE `workflow_model_id` = " . $workflowModelId);

        // delete workflow_transitions
        $this->execute("DELETE FROM `workflow_transitions` WHERE `workflow_model_id` = " . $workflowModelId);
    }
}
