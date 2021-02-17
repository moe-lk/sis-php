<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentreRoomsExaminationsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_centre_rooms_examinations');
    }

}