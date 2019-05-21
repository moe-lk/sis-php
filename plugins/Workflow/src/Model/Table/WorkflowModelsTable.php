<?php
namespace Workflow\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;
use Cake\Core\Configure;

use App\Model\Table\AppTable;

class WorkflowModelsTable extends AppTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->hasMany('Workflows', ['className' => 'Workflow.Workflows', 'dependent' => true, 'cascadeCallbacks' => true]);
        $this->hasMany('WorkflowStatuses', ['className' => 'Workflow.WorkflowStatuses', 'dependent' => true, 'cascadeCallbacks' => true]);
        $this->hasMany('WorkflowTransitions', ['className' => 'Workflow.WorkflowTransitions', 'dependent' => true, 'cascadeCallbacks' => true]);
    }

    public function beforeFind(Event $event, Query $query, ArrayObject $options, $primary)
    {
        $condition = [];
        if (Configure::read('schoolMode')) {
            $condition = [
                $this->aliasField('model').' NOT IN ' => [
                    'Training.TrainingCourses',
                    'Training.TrainingSessions',
                    'Training.TrainingSessionResults',
                    'Institution.StaffTrainingNeeds',
                    'Institution.InstitutionSurveys',
                    'Quality.VisitRequests',
                    'Training.TrainingApplications',
                    'Cases.InstitutionCases',
                    'Institution.StaffTransferIn',
                    'Institution.StaffTransferOut'
                ]
            ];
        }
        return $query->where($condition);
    }

    public function getWorkflowStatusSteps($modelName, $code)
    {
        return $this
            ->find('list', [
                'keyField' => 'step_id',
                'valueField' => 'step_id'
            ])
            ->matching('WorkflowStatuses.WorkflowSteps')
            ->where([
                $this->aliasField('model') => $modelName,
                'WorkflowStatuses.code' => $code
            ])
            ->select(['step_id' => 'WorkflowSteps.id'])
            ->toArray();
    }

    public function getWorkflowStatuses($model)
    {
        return $this
            ->find('list', [
                'keyField' => 'workflow_status_id',
                'valueField' => 'workflow_status_name'
            ])
            ->matching('WorkflowStatuses')
            ->where([$this->aliasField('model') => $model])
            ->select(['workflow_status_id' => 'WorkflowStatuses.id', 'workflow_status_name' => 'WorkflowStatuses.name'])
            ->toArray();
    }

    public function getWorkflowStatusesCode($model)
    {
        return $this
            ->find('list', [
                'keyField' => 'workflow_status_id',
                'valueField' => 'workflow_status_code'
            ])
            ->matching('WorkflowStatuses')
            ->where([$this->aliasField('model') => $model])
            ->select(['workflow_status_id' => 'WorkflowStatuses.id', 'workflow_status_code' => 'WorkflowStatuses.code'])
            ->toArray();
    }

    public function getFeatureOptions()
    {
        $records = $this->find()->distinct(['model'])->all();

        $featureOptions = [];
        foreach ($records as $obj) {
            $model = TableRegistry::get($obj->model);
            $feature = Inflector::humanize(Inflector::underscore($model->alias()));
            $featureOptions[$model->alias()] = __($feature);
        }

        return $featureOptions;
    }
}
