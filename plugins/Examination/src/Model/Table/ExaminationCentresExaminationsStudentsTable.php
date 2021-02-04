<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentresExaminationsStudentsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('examination_centres_examinations_students');

        $this->table('examination_centres_examinations_students');
    }
}