<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationItemResultsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_item_results');
    }
}