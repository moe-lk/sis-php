<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentresExaminationsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_centres_examinations_subjects');
        $this->belongsTo('Examination', ['className' => 'Examnation.Centers', 'foreignKey' => 'examination_centre_id']);

        parent::initialize($config);
    }
}