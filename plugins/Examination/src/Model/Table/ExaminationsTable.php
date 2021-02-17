<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationsTable extends Table
{
    public function initialize(array $config)
    {
        // $this->setTable('examinations');

        $this->table('examinations');
        parent::initialize($config);
    }
}