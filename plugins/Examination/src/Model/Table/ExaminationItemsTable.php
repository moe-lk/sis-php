<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationItemsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_items');
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

        $this->hasMany('ExaminationSchoolStudents', ['className' => 'Examination.ExaminationStudents', 'saveStrategy' => 'replace', 'cascadeCallbacks' => true]);

       //add behaviour

        $this->addBehavior('Restful.RestfulAccessControl',[

            //ExaminationSchoolStudents=> ['view', 'edit']
        ]);

        

/*
        $this->field('students', [
            'label' => '',
            'override' => true,
            'type' => 'element',
            'element' => 'Examinations.Students/students',
            'data' => [
                'students' => [],
                'studentOptions' => []
            ],
            'visible' => ['view' => true, 'edit' => true]
        ]);
        */
    }
}