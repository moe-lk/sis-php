<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentreRoomsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('examination_centre_rooms');

        $this->table('examination_centre_rooms');
    }
}