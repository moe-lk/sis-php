<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentresExaminationsInvigilatorsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('examination_centres_examinations_invigilators');

        $this->table('examination_centres_examinations_invigilators');
    }
}