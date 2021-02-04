<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationItemsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('examination_items');

        $this->table('examination_items');
    }
}