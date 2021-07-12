<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentreRoomsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_centre_rooms');
        $this->belongsTo('Examination', ['className' => 'Examnation.Centers', 'foreignKey' => 'examination_centre_id']);

        parent::initialize($config);
    }
}