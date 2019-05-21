<?php

use Phinx\Migration\AbstractMigration;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;

class PSSCC12 extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    
    public function up()
    {
        $WorkflowStepsTable = TableRegistry::get('Workflow.WorkflowSteps');
        $SecurityRoles = TableRegistry::get('Security.SecurityRoles');

        $allWorkFlowStepsId = $WorkflowStepsTable->find()
            ->matching('Workflows.WorkflowModels')
            ->where([
                'WorkflowModels.model' => 'Institution.StudentWithdraw'
            ])
            ->extract('id');

        $allSecurityRolesId = $SecurityRoles->find()
            ->where([$SecurityRoles->aliasField('code') => 'ADMINISTRATOR'])
            ->orWhere([$SecurityRoles->aliasField('code') => 'PRINCIPAL'])
            ->extract('id');

        foreach($allWorkFlowStepsId as $workFlowStepsId) {  
            foreach($allSecurityRolesId as $securityRolesId) { 
                $assignStepsToRoles = [
                    [
                        'id' => Text::uuid(),
                        'workflow_step_id' => $workFlowStepsId,
                        'security_role_id' => $securityRolesId 
                    ]
                ]; 
                $this->insert('workflow_steps_roles', $assignStepsToRoles);
            }
        }
    }

    public function down()
    {
        $WorkflowStepsTable = TableRegistry::get('Workflow.WorkflowSteps');
        $SecurityRoles = TableRegistry::get('Security.SecurityRoles');

        $allWorkFlowStepsId = $WorkflowStepsTable->find()
            ->matching('Workflows.WorkflowModels')
            ->where([
                'WorkflowModels.model' => 'Institution.StudentWithdraw'
            ])
            ->extract('id');

        $allSecurityRolesId = $SecurityRoles->find()
            ->where([$SecurityRoles->aliasField('code') => 'ADMINISTRATOR'])
            ->orWhere([$SecurityRoles->aliasField('code') => 'PRINCIPAL'])
            ->extract('id');    

        foreach($allWorkFlowStepsId as $workFlowStepsId) {   
            foreach($allSecurityRolesId as $securityRolesId) { 
                $this->execute("DELETE FROM `workflow_steps_roles` WHERE `workflow_step_id` = " . $workFlowStepsId . " AND `security_role_id` = " . $securityRolesId); 
            }
        }
    }
}
