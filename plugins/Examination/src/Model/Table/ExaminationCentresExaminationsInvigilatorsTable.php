<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentresExaminationsInvigilatorsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_centres_examinations_invigilators');
    }
}