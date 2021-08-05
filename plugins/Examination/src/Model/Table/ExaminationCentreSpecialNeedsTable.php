<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentreSpecialNeedsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_centre_special_needs');
        $this->belongsTo('Examination', ['className' => 'Examnation.Centers', 'foreignKey' => 'examination_centre_id']);

        parent::initialize($config);
    }
}