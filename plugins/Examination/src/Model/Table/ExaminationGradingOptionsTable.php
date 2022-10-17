<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;

class ExaminationGradingOptionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('examination_grading_options');
        $this->belongsTo('Examination', ['className' => 'Examination.GradeTypes', 'foreignKey' => 'examination_grading_type_id']);
        
        parent::initialize($config);

    }
}
