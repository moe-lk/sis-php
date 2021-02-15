<?php
namespace Health\Model\Table;

use ArrayObject;

use Cake\Event\Event;

use App\Model\Table\ControllerActionTable;

class InsuranceClaimsTable extends ControllerActionTable
{
    public function initialize(array $config)
    {
        $this->table('student_insurance_claims');
        parent::initialize($config);

        $this->belongsTo('Users', ['className' => 'User.Users', 'foreignKey' => 'security_user_id']);
            
        $this->addBehavior('Health.Health');
        
    }
}