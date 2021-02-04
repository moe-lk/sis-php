<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentresExaminationsInstitutionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('examination_centres_examinations_institutions');

        $this->table('examination_centres_examinations_institutions');
    }
}