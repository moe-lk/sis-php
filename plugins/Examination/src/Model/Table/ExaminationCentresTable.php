<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentresTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_centres');
        parent::initialize($config);
    }
}