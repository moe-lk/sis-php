<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentreRoomsExaminationsStudentsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_centre_rooms_examinations_students');
        $this->belongsTo('Examination', ['className' => 'Examination.ExaminationCentres', 'foreignKey' => 'examination_centre_id']);

        parent::initialize($config);
    }
}
