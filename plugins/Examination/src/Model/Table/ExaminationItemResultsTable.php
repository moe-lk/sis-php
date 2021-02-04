<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationItemResultsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('examination_item_results');

        $this->table('examination_item_results');
    }
}