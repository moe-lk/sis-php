<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationStudentsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_students');
    }
}