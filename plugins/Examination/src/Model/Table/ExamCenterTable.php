<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExamCenterTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('exam_center');

        parent::initialize($config);

        // $this->addBehavior();
    }
    
}