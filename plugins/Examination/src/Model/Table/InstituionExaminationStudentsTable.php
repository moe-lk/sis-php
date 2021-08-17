<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class InstituionExaminationStudentsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_students');
        $this->belongsToMany('EducationSubjects', [
            'className' => 'Education.EducationSubjects',
            'joinTable' => 'assessment_items_grading_types',
            'foreignKey' => 'assessment_period_id',
            'targetForeignKey' => 'education_subject_id',
            'through' => 'Assessment.AssessmentItemsGradingTypes',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->belongsToMany('ExaminationGradingTypes', [
            'className' => 'Assessment.AssessmentGradingTypes',
            'joinTable' => 'assessment_items_grading_types',
            'foreignKey' => 'assessment_period_id',
            'targetForeignKey' => 'assessment_grading_type_id',
            'through' => 'Assessment.AssessmentItemsGradingTypes',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);

        $this->belongsToMany('ExaminaionStudents', [
            'className' => 'Examination.ExaminationStudents',
            'through' => 'Examination.ExaminationItems',
            'foreignKey' => 'examination_id',
            'targetForeignKey' => 'student_id',
            'dependent' => true
        ]);

        public function implementedEvents()
    {
        $events = parent::implementedEvents();
      $events['Model.ExaminationStudents.afterSave'] = 'ExaminationStudentsAfterSave';
     // $events['ControllerAction.Model.afterAction'] = ['callable' => 'deleteAfterAction', 'priority' => 10];
        return $events;
    }

    public function beforeAction(Event $event, ArrayObject $extra){

        $institutionId = $this->Session->read('Institution.Institutions.id');
        $extra['institution_id'] = $institutionId;
        $academicPeriodOptions = $this->getAcademicPeriodOptions($institutionId);
        $selectedAcademicPeriodId = $this->AcademicPeriods->getCurrent();

        if ($this->action == 'index') {
            if (empty($query['academic_period_id'])) {
                $query['academic_period_id'] = $this->AcademicPeriods->getCurrent();
            }

        }

        if (array_key_exists($this->alias(), $this->request->data)) {
            $selectedAcademicPeriodId = $this->postString('academic_period_id', $academicPeriodOptions);
        } elseif ($this->action == 'edit' && isset($this->request->pass[1])) {
            $id = $this->paramsDecode($this->request->pass[1]);
            if ($this->exists($id)) {
                $selectedAcademicPeriodId = $this->get($id)->academic_period_id;
            }
        }

        $extra['selectedAcademicPeriodId'] = $selectedAcademicPeriodId;

        $this->field('modified', ['visible' => false]);
        $this->field('created_user_id', ['visible' => false]);
        $this->field('created', ['visible' => false]);
        $this->field('modified_user_id', ['visible' => false]);

        $this->field('academic_period', ['type' => 'integer', 'visible' => ['view' => true]]);

        $this->field('nsid',['visible'=>true]);
        $this->field('f_name',['visible'=>true]);
        $this->field('gender',['visible'=>true]);
        $this->field('medium',['visible'=>true]);
        $this->field('b_date',['visible'=>true]);
        $this->field('user_identities',['visible'=>true]);
        

        $this->setFieldOrder([
            'nsid','f_name', 'gender','medium','b_date', 'user_identities']);

        if ($this->action != 'index') {
            if (isset($extra['toolbarButtons']['export'])) {
                unset($extra['toolbarButtons']['export']);
            }
        }
    
    }
}
