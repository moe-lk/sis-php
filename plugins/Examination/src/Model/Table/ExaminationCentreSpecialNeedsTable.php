<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentreSpecialNeedsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('examination_centre_special_needs');

        $this->table('examination_centre_special_needs');
    }
}