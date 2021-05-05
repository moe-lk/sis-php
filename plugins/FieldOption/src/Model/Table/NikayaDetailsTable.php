<?php
namespace FieldOption\Model\Table;

use App\Model\Table\ControllerActionTable;


class NikayaTypeTable extends ControllerActionTable
{
    public function initialize(array $config)
    {
        $this->table('nikaya_details');
        parent::initialize($config);
        $this->hasMany('SamaneraDetails', ['className' => 'User.SamaneraDetails', 'foreignKey' => 'nikaya_type_id']);
        $this->addBehavior('FieldOption.FieldOption');
    }
}
