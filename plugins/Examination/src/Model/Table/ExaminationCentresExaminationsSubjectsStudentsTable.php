<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentresExaminationsSubjectsStudentsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_centres_examinations_subjects_students');
        $this->belongsTo('Examination', ['className' => 'Examnation.Centers', 'foreignKey' => 'examination_centre_id']);

        parent::initialize($config);
    }
}