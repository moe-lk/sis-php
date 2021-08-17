<?php
namespace User\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Core\Configure;
use App\Model\Table\ControllerActionTable;

use Cake\Event\Event;
use Cake\Validation\Validator;

/**
 * SamaneraDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $StudentType
 * @property \Cake\ORM\Association\BelongsTo $NikayaDetails
 *
 * @method \User\Model\Entity\SamaneraDetail get($primaryKey, $options = [])
 * @method \User\Model\Entity\SamaneraDetail newEntity($data = null, array $options = [])
 * @method \User\Model\Entity\SamaneraDetail[] newEntities(array $data, array $options = [])
 * @method \User\Model\Entity\SamaneraDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \User\Model\Entity\SamaneraDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \User\Model\Entity\SamaneraDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \User\Model\Entity\SamaneraDetail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SamaneraDetailsTable extends ControllerActionTable
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('samanera_details');
        parent::initialize($config);
        $this->behaviors()->get('ControllerAction')->config('actions.search', false);
       // $this->displayField('id');
        $this->primaryKey('id');
        

        //$this->belongsTo('Users', ['className' => 'User.Users', 'foreignKey' => 'id']);
        //$this->belongsTo('StudentType', ['className' => 'FieldOption.StudentType']);
        //$this->belongsTo('NikayaDetails', ['className' => 'FieldOption.NikayaDetails']);

        $this->addBehavior('Timestamp');
        
        $this->belongsTo('StudentType', [
            'foreignKey' => 'student_type_id',
            'className' => 'User.StudentType'
        ]);

        $this->belongsTo('NikayaDetails', [
            'foreignKey' => 'nikaya_type_id',
            'className' => 'User.NikayaDetails'
        ]);

        $this->toggle('add', true); 
        $this->toggle('edit', true);
        $this->toggle('remove', true);

        
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */

     /*
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('samanera_certification_number', 'create')
            ->notEmpty('samanera_certification_number');

        $validator
            ->dateTime('date_of_ordination')
            ->allowEmpty('date_of_ordination');

        $validator
            ->allowEmpty('place_of_ordi.');

        return $validator;
    }

    */

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */

    /*
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['student_type_id'], 'StudentType'));
        $rules->add($rules->existsIn(['nikaya_id'], 'NikayaDetails'));

        return $rules;
    }

    */

    public function beforeAction($event)
    {
        $this->fields['student_type_id']['type'] = 'select';
        $this->fields['nikaya_type_id']['type'] = 'select';
    }

    private function setupTabElements() {
		$options = [
			'userRole' => '',
		];

		switch ($this->controller->name) {
			case 'Students':
				$options['userRole'] = 'Students';
				break;
			case 'Staff':
				$options['userRole'] = 'Staff';
				break;
		}

        

		$tabElements = $this->controller->getUserTabElements($options);
		$this->controller->set('tabElements', $tabElements);
		$this->controller->set('selectedAction', $this->alias());
	}

    public function validationDefault(Validator $validator)
    {
        $validator = parent::validationDefault($validator);

        return $validator
            ->allowEmpty('samanera_certification_number')
        ;
    }
    public function afterAction(Event $event, $data)
    {
        $this->setupTabElements();
        $this->setFieldOrder(['student_type_id', 'samanera_certification_number', 'nikaya_id', 'date_of_ordination','place_of_ordination']);
    }



}
