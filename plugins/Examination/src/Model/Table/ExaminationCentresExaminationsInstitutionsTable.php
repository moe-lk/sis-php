<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationCentresExaminationsInstitutionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_centres_examinations_institutions');
//         $this->belongsTo('Examination', ['className' => 'Examnation.Centers', 'foreignKey' => 'examination_centre_id']);
        $this->belongsTo('ExaminationCentres', ['className' => 'Examination.ExaminationCentres', 'foreignKey' => 'examination_centre_id']);


        parent::initialize($config);
    }
}
