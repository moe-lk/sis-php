<?php
namespace Examination\Model\Table;


use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use ArrayObject;
use Cake\ORM\Query;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Network\Request;
use Cake\Event\Event;
use Cake\Utility\Text;
use Cake\I18n\Time;
use Cake\Validation\Validator;
use App\Model\Traits\OptionsTrait;
use App\Model\Table\ControllerActionTable;
use Cake\Utility\Security;

/**
 * ExaminationStudents Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Examinations
 *
 * @method \Examination\Model\Entity\ExaminationStudent get($primaryKey, $options = [])
 * @method \Examination\Model\Entity\ExaminationStudent newEntity($data = null, array $options = [])
 * @method \Examination\Model\Entity\ExaminationStudent[] newEntities(array $data, array $options = [])
 * @method \Examination\Model\Entity\ExaminationStudent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Examination\Model\Entity\ExaminationStudent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Examination\Model\Entity\ExaminationStudent[] patchEntities($entities, array $data, array $options = [])
 * @method \Examination\Model\Entity\ExaminationStudent findOrCreate($search, callable $callback = null, $options = [])
 */
class ExaminationStudentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('examination_students');
        $this->displayField('st_no');
        $this->primaryKey('st_no');

        $this->belongsTo('Examinations', [
            'foreignKey' => 'examination_id',
            'className' => 'Examination.Examinations'
        ]);

        parent::initialize($config);
        $this->belongsTo('Users', ['className' => 'User.Users', 'foreignKey' => 'student_id']);
        $this->belongsTo('Institutions', ['className' => 'Institution.Institutions']);
        $this->belongsTo('AcademicPeriods', ['className' => 'AcademicPeriod.AcademicPeriods']);
        $this->belongsTo('ExaminationCentres', ['className' => 'Examination.ExaminationCentres']);
        $this->belongsTo('ExaminationItems', ['className' => 'Examination.ExaminationItems']);

        
        $this->hasMany('Identities', [
            'className' => 'User.Identities',
            'through' => 'User.Users',
             'foreignKey' => 'security_user_id', 
             'targetForeignKey' => 'id',
             'joinType' => 'INNER',
             'dependent' => true]);

             $this->addBehavior('Excel', [
                'excludes' => ['id'],
                'pages' => ['index'],
                'filename' => 'ExaminationStudets',
                'orientation' => 'landscape'
            ]);

            $this->addBehavior('CompositeKey');

            $this->toggle('add', false); 
            $this->toggle('edit', false);
            $this->toggle('remove', false);
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
            ->allowEmpty('nsid');

       

        $validator
            ->requirePresence('f_name', 'create')
            ->notEmpty('f_name');

        $validator
            ->allowEmpty('medium');

        $validator
            ->date('b_date')
            ->requirePresence('b_date', 'create')
            ->notEmpty('b_date');

        $validator
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');

        $validator
            ->allowEmpty('pvt_address');

        $validator
            ->requirePresence('a_income', 'create')
            ->notEmpty('a_income');

        $validator
            ->boolean('spl_need')
            ->allowEmpty('spl_need');

        $validator
            ->allowEmpty('disability_type');

        $validator
            ->allowEmpty('disability');

        $validator
            ->allowEmpty('sp_center');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

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

    public function beforeAction(Event $event, ArrayObject $extra){

        $institutionId = $this->Session->read('Institution.Institutions.id');
        $extra['institution_id'] = $institutionId;
        $academicPeriodOptions = $this->getAcademicPeriodOptions($institutionId);
        $selectedAcademicPeriodId = $this->AcademicPeriods->getCurrent();

        if ($this->action == 'index') {
            if (empty($query['academic_period_id'])) {
                $query['academic_period_id'] = $this->AcademicPeriods->getCurrent();
            }

        }

        if (array_key_exists($this->alias(), $this->request->data)) {
            $selectedAcademicPeriodId = $this->postString('academic_period_id', $academicPeriodOptions);
        } elseif ($this->action == 'edit' && isset($this->request->pass[1])) {
            $id = $this->paramsDecode($this->request->pass[1]);
            if ($this->exists($id)) {
                $selectedAcademicPeriodId = $this->get($id)->academic_period_id;
            }
        }

        $extra['selectedAcademicPeriodId'] = $selectedAcademicPeriodId;

        $this->field('modified', ['visible' => false]);
        $this->field('created_user_id', ['visible' => false]);
        $this->field('created', ['visible' => false]);
        $this->field('modified_user_id', ['visible' => false]);

        $this->field('academic_period', ['type' => 'integer', 'visible' => ['view' => true]]);

        $this->field('nsid',['visible'=>true]);
        $this->field('f_name',['visible'=>true]);
        $this->field('gender',['visible'=>true]);
        $this->field('medium',['visible'=>true]);
        $this->field('b_date',['visible'=>true]);
        $this->field('user_identities',['visible'=>true]);
        

        $this->setFieldOrder([
            'nsid','f_name', 'gender','medium','b_date', 'user_identities']);

        if ($this->action != 'index') {
            if (isset($extra['toolbarButtons']['export'])) {
                unset($extra['toolbarButtons']['export']);
            }
        }
    
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['examination_id'], 'Examinations'));

        return $rules;
    }

    public function onExcelBeforeStart (Event $event, ArrayObject $settings, ArrayObject $sheets)
    {
        $sheets[] = [
            'name' => $this->alias(),
            'table' => $this,
            'query' => $this->find(),
            'orientation' => 'landscape'
        ];
    }

    public function onExcelBeforeQuery(Event $event, ArrayObject $settings, Query $query)
    {
        $institutionId = $this->Session->read('Institution.Institutions.id');
        $examinationId = $this->request->query('examination_id');

        $query
            ->contain(['Users.Genders', 'Institutions', 'Examinations.EducationGrades'])
            ->select(['openemis_no' => 'Users.openemis_no', 'gender_name' => 'Genders.name', 'dob' => 'Users.date_of_birth', 'education_grade' => 'EducationGrades.name'])
            ->where([$this->aliasField('institution_id') => $institutionId,
                $this->aliasField('examination_id') => $examinationId])
            ->order([$this->aliasField('examination_centre_id')]);
    }

    public function onExcelUpdateFields(Event $event, ArrayObject $settings, ArrayObject $fields)
    {
        $newFields = [];

        $newFields[] = [
            'key' => 'Users.openemis_no',
            'field' => 'openemis_no',
            'type' => 'string',
            'label' => '',
        ];

        $newFields[] = [
            'key' => 'ExaminationStudents.f_name',
            'field' => 'name',
            'type' => 'string',
            'label' => '',
        ];


        

        $newFields[] = [
            'key' => 'ExaminationStudents.examination_centre_id',
            'field' => 'examination_centre_id',
            'type' => 'integer',
            'label' => '',
        ];

      
        $newFields[] = [
            'key' => 'ExaminationStudents.student_id',
            'field' => 'student_id',
            'type' => 'integer',
            'label' => '',
        ];

        $newFields[] = [
            'key' => 'Users.gender_id',
            'field' => 'gender_name',
            'type' => 'string',
            'label' => ''
        ];

        $newFields[] = [
            'key' => 'Users.date_of_birth',
            'field' => 'dob',
            'type' => 'date',
            'label' => '',
        ];

        
// added medium
        $newFields[] = [
            'key' => 'ExaminationStudents.medium',
            'field' => 'medium',
            'type' => 'string',
            'label' => '',
        ];

       

        $newFields[] = [
            'key' => 'Identities.number',
            'field' => 'nic',
            'type' => 'string',
            'label' => '',
        ];

       

        $fields->exchangeArray($newFields);
    }

    public function onExcelGetExaminationId(Event $event, Entity $entity)
    {
        if ($entity->has('examination')) {
            return $entity->examination->code_name;
        } else {
            return '';
        }
    }

    public function onExcelGetExaminationCentreId(Event $event, Entity $entity)
    {
        if ($entity->has('examination_centre')) {
            return $entity->examination_centre->code_name;
        } else {
            return '';
        }
    }

    public function onExcelGetInstitutionId(Event $event, Entity $entity)
    {
        if ($entity->has('institution')) {
            return $entity->institution->code_name;
        } else {
            return '';
        }
    }

    public function implementedEvents()
    {
        $events = parent::implementedEvents();
        $events['ControllerAction.Model.onGetFieldLabel'] = 'onGetFieldLabel';
        return $events;
    }

    

    public function indexBeforeQuery(Event $event, Query $query, ArrayObject $extra)
    {
        $extra['elements']['controls'] = ['name' => 'Examination.controls', 'data' => [], 'options' => [], 'order' => 1];
    }

    public function onUpdateFieldAcademicPeriodId(Event $event, array $attr, $action, $request)
    {
        if ($action == 'add') {
            $selectedAcademicPeriod = $this->AcademicPeriods->getCurrent();

            $attr['default'] = $selectedAcademicPeriod;
            $attr['onChangeReload'] = 'changeAcademicPeriodId';
        }

        return $attr;
    }

    public function addOnChangeAcademicPeriodId(Event $event, Entity $entity, ArrayObject $data, ArrayObject $options)
    {
        if (array_key_exists($this->alias(), $data)) {
            if (array_key_exists('examination_id', $data[$this->alias()])) {
                unset($data[$this->alias()]['examination_id']);
            }
        
            }
            if (array_key_exists('institution_class_id', $data[$this->alias()])) {
                unset($data[$this->alias()]['institution_class_id']);
            }
        }

        public function onUpdateFieldExaminationId(Event $event, array $attr, $action, $request)
    {
        $examinationOptions = [];

        if ($action == 'add') {
            $todayDate = Time::now();

            if(!empty($request->data[$this->alias()]['academic_period_id'])) {
                $selectedAcademicPeriod = $request->data[$this->alias()]['academic_period_id'];
            } else {
                $selectedAcademicPeriod = $this->AcademicPeriods->getCurrent();
            }

            $InstitutionGrades = TableRegistry::get('Institution.InstitutionGrades');
            $availableGrades = $InstitutionGrades
                ->find('list', ['keyField' => 'education_grade_id', 'valueField' => 'education_grade_id'])
                ->where([$InstitutionGrades->aliasField('institution_id') => $this->institutionId])
                ->toArray();

            $Examinations = $this->Examinations;
            $examinationOptions = $Examinations->find('list')
                ->where([
                    $Examinations->aliasField('academic_period_id') => $selectedAcademicPeriod,
                   // $Examinations->aliasField('education_grade_id IN ') => $availableGrades
                ])
                ->toArray();

            $examinationId = isset($request->data[$this->alias()]['examination_id']) ? $request->data[$this->alias()]['examination_id'] : null;
            $this->advancedSelectOptions($examinationOptions, $examinationId, [
                'message' => '{{label}} - ' . $this->getMessage('ExaminationStudents.notAvailableForRegistration'),
                'selectOption' => false,
                'callable' => function($id) use ($Examinations, $todayDate) {
                    return $Examinations
                        ->find()
                        ->where([
                            $Examinations->aliasField('id') => $id,
                            $Examinations->aliasField('registration_start_date <=') => $todayDate,
                            $Examinations->aliasField('registration_end_date >=') => $todayDate
                        ])
                        ->count();
                }
            ]);

            $attr['options'] = $examinationOptions;
            $attr['onChangeReload'] = 'changeExaminationId';
        }

        return $attr;
    }

    public function addOnChangeExaminationId(Event $event, Entity $entity, ArrayObject $data, ArrayObject $options)
    {
        if (array_key_exists($this->alias(), $data)) {
            if (array_key_exists('examination_centre_id', $data[$this->alias()])) {
                unset($data[$this->alias()]['examination_centre_id']);
            }
            if (array_key_exists('institution_class_id', $data[$this->alias()])) {
                unset($data[$this->alias()]['institution_class_id']);
            }
        }
    }

    public function onUpdateFieldInstitutionClassId(Event $event, array $attr, $action, $request)
    {
        $classes = [];

        if ($action == 'add') {
            if (!empty($request->data[$this->alias()]['examination_id'])) {
                $examinationId = $request->data[$this->alias()]['examination_id'];
                $educationGradeId = $this->Examinations->get($examinationId)->education_grade_id;
                $academicPeriodId = $request->data[$this->alias()]['academic_period_id'];

                $InstitutionClass = TableRegistry::get('Institution.InstitutionClasses');
                $classes = $InstitutionClass
                    ->find('list')
                    ->matching('ClassGrades')
                    ->where([$InstitutionClass->aliasField('institution_id') => $this->institutionId,
                        $InstitutionClass->aliasField('academic_period_id') => $academicPeriodId,
                        'ClassGrades.education_grade_id' => $educationGradeId])
                    ->order($InstitutionClass->aliasField('name'))
                    ->toArray();
            }

            $attr['options'] = $classes;
        }

        return $attr;
    }




}

