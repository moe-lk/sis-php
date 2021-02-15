<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationGradingOptionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_grading_options');
    }
}