<?php
namespace FieldOption\Model\Table;

use Cake\Validation\Validator;
use App\Model\Table\ControllerActionTable;
use Cake\ORM\Query;

class StudentTypeTable extends ControllerActionTable
{
    public function initialize(array $config)
    {
        $this->table('student_type');
        parent::initialize($config);
        $this->hasMany('SamaneraDetails', ['className' => 'User.SamaneraDetails', 'foreignKey' => 'student_type_id']);
        $this->addBehavior('FieldOption.FieldOption');
    }
    

 
}
