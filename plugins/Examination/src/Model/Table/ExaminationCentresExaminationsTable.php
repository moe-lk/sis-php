<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentresExaminationsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('examination_centres_examinations_subjects');

        $this->table('examination_centres_examinations_subjects');
    }
}