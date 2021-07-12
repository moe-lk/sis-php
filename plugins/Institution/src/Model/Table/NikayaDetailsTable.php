<?php
namespace Institution\Model\Table;

use App\Model\Table\ControllerActionTable;

class NikayaDetailsTable extends ControllerActionTable
{
    public function initialize(array $config)
    {
        $this->table('nikaya_details');
        parent::initialize($config);
        $this->hasMany('Institutions', ['className' => 'Institution.Institutions', 'foreignKey' => 'nikaya_type_id']);
        $this->addBehavior('FieldOption.FieldOption');
    }
}
