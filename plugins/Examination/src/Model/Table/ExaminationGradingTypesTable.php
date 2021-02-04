<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationGradingTypesTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('examination_grading_types');

        $this->table('examination_grading_types');
    }
}