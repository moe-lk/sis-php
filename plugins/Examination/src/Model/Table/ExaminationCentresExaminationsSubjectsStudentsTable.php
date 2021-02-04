<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentresExaminationsSubjectsStudentsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('examination_centres_examinations_subjects_students');

        $this->table('examination_centres_examinations_subjects_students');
    }
}