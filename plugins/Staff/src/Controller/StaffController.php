<?php
namespace Staff\Controller;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use App\Controller\AppController;

class StaffController extends AppController
{
    private $features = [
        // General
        'Identities',
        'UserNationalities',
        'Contacts',
        'UserLanguages',
        'SpecialNeeds',
        'Attachments',
        'Comments',

        // academic
        'EmploymentStatuses',
        'StaffClasses',
        'StaffSubjects',
        'Awards',
        'Memberships',
        'Licenses',

        // qualification
        'Employments',
        'Qualifications',
        'Extracurriculars',

        // finance
        'BankAccounts',
        'Salaries',

        // training
        'StaffTrainings',

        // health
        'Healths',
        'Allergies',
        'Consultations',
        'Families',
        'Histories',
        'Immunizations',
        'Medications',
        'Tests',
    ];

    public function initialize()
    {
        parent::initialize();

        $this->ControllerAction->model('Staff.Staff');

        $this->ControllerAction->models = [
            'Accounts'          => ['className' => 'Staff.Accounts', 'actions' => ['view', 'edit']],
            'Nationalities'     => ['className' => 'User.Nationalities'],
            'Positions'             => ['className' => 'Staff.Positions', 'actions' => ['index', 'view']],
            'Sections'          => ['className' => 'Staff.StaffSections', 'actions' => ['index', 'view']],
            'Classes'           => ['className' => 'Staff.StaffClasses', 'actions' => ['index', 'view']],
            'Qualifications'    => ['className' => 'Staff.Qualifications'],
            'Absences'          => ['className' => 'Staff.Absences', 'actions' => ['index', 'view']],
            'Extracurriculars'  => ['className' => 'Staff.Extracurriculars'],
            'History'           => ['className' => 'User.UserActivities', 'actions' => ['index']],
            'ImportStaff'       => ['className' => 'Staff.ImportStaff', 'actions' => ['index', 'add']],
            'TrainingResults'   => ['className' => 'Staff.TrainingResults', 'actions' => ['index', 'view']],
            'Achievements'      => ['className' => 'Staff.Achievements'],
            'ImportSalaries'    => ['className' => 'Staff.ImportSalaries', 'actions' => ['add']]
        ];

        if (!in_array('Trainings', (array) Configure::read('School.excludedPlugins'))) {
            $this->loadComponent('Training.Training');
        }
        $this->loadComponent('User.Image');
        $this->loadComponent('Institution.InstitutionAccessControl');

        $this->set('contentHeader', 'Staff');
    }

    // CAv4
    public function Employments()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'User.UserEmployments']);
    }
    public function Qualifications()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Staff.Qualifications']);
    }
    public function Positions()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Staff.Positions']);
    }
    public function Classes()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Staff.StaffClasses']);
    }
    public function Subjects()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Staff.StaffSubjects']);
    }
    public function EmploymentStatuses()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Staff.EmploymentStatuses']);
    }
    public function Nationalities()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'User.UserNationalities']);
    }
    public function Languages()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'User.UserLanguages']);
    }
    public function SpecialNeeds()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'User.SpecialNeeds']);
    }
    public function Memberships()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Staff.Memberships']);
    }
    public function Licenses()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Staff.Licenses']);
    }
    public function Contacts()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'User.Contacts']);
    }
    public function BankAccounts()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'User.BankAccounts']);
    }
    public function Identities()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'User.Identities']);
    }
    public function Awards()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'User.Awards']);
    }
    public function TrainingNeeds()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Staff.TrainingNeeds']);
    }
    public function Attachments()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'User.Attachments']);
    }
    public function Courses()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Staff.StaffTrainings']);
    }
    public function Salaries()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Staff.Salaries']);
    }
    public function Behaviours()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Staff.StaffBehaviours']);
    }

    // health
    public function Healths()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Health.Healths']);
    }
    public function HealthAllergies()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Health.Allergies']);
    }
    public function HealthConsultations()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Health.Consultations']);
    }
    public function HealthFamilies()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Health.Families']);
    }
    public function HealthHistories()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Health.Histories']);
    }
    public function HealthImmunizations()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Health.Immunizations']);
    }
    public function HealthMedications()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Health.Medications']);
    }
    public function HealthTests()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Health.Tests']);
    }
    // End Health
    // End

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $session = $this->request->session();
        $this->Navigation->addCrumb('Institutions', ['plugin' => 'Institution', 'controller' => 'Institutions', 'action' => 'Institutions', 'index']);
        $institutionName = $session->read('Institution.Institutions.name');
        $institutionId = $session->read('Institution.Institutions.id');
        $this->Navigation->addCrumb($institutionName, ['plugin' => 'Institution', 'controller' => 'Institutions', 'action' => 'dashboard', $this->ControllerAction->paramsEncode(['id' => $institutionId])]);
        $this->Navigation->addCrumb('Staff', ['plugin' => 'Institution', 'controller' => 'Institutions', 'action' => 'Staff']);
        $action = $this->request->params['action'];
        $header = __('Staff');

        if ($action == 'index') {
        } else if ($session->check('Staff.Staff.id') || $action == 'view' || $action == 'edit') {
            // add the student name to the header
            $id = 0;
            if (isset($this->request->pass[0]) && ($action == 'view' || $action == 'edit')) {
                $id = $this->request->pass[0];
            } else if ($session->check('Staff.Staff.id')) {
                $id = $session->read('Staff.Staff.id');
            }

            if (!empty($id)) {
                $entity = $this->Staff->get($id);
                $name = $entity->name;
                $header = $name . ' - ' . __('Overview');
                $this->Navigation->addCrumb($name, ['plugin' => 'Institution', 'controller' => 'Institutions', 'action' => 'StaffUser', 'view', $this->ControllerAction->paramsEncode(['id' => $id])]);
            }
        }
        $this->set('contentHeader', $header);
    }

    public function onInitialize(Event $event, Table $model, ArrayObject $extra)
    {
        /**
         * if student object is null, it means that student.security_user_id or users.id is not present in the session; hence, no sub model action pages can be shown
         */
        $session = $this->request->session();
        if ($session->check('Staff.Staff.id')) {
            $header = '';
            $userId = $session->read('Staff.Staff.id');

            if ($session->check('Staff.Staff.name')) {
                $header = $session->read('Staff.Staff.name');
            }

            $primaryKey = $model->primaryKey();

            $alias = $model->alias;
            $this->Navigation->addCrumb($model->getHeader($alias));
            $header = $header . ' - ' . $model->getHeader($alias);

            // $params = $this->request->params;
            $this->set('contentHeader', $header);

            // POCOR-3983 to disable add/edit/remove action on the model when institution status is inactive
            $this->getStatusPermission($model);

            if ($model->hasField('security_user_id')) {
                $model->fields['security_user_id']['type'] = 'hidden';
                $model->fields['security_user_id']['value'] = $userId;

                if (count($this->request->pass) > 1) {
                    $modelId = $this->request->pass[1]; // id of the sub model

                    $ids = $this->ControllerAction->paramsDecode($modelId);
                    $idKey = $this->ControllerAction->getIdKeys($model, $ids);
                    $idKey[$model->aliasField('security_user_id')] = $userId;

                    $exists = $model->exists($idKey);

                    /**
                     * if the sub model's id does not belongs to the main model through relation, redirect to sub model index page
                     */
                    if (!$exists) {
                        $this->Alert->warning('general.notExists');
                        return $this->redirect(['plugin' => 'Staff', 'controller' => 'Staff', 'action' => $alias]);
                    }
                }
            } else if ($model->hasField('staff_id')) {
                $model->fields['staff_id']['type'] = 'hidden';
                $model->fields['staff_id']['value'] = $userId;

                if (count($this->request->pass) > 1) {
                    $modelId = $this->request->pass[1]; // id of the sub model

                    $ids = $this->ControllerAction->paramsDecode($modelId);
                    $idKey = $this->ControllerAction->getIdKeys($model, $ids);
                    $idKey[$model->aliasField('staff_id')] = $userId;

                    $exists = $model->exists($idKey);

                    /**
                     * if the sub model's id does not belongs to the main model through relation, redirect to sub model index page
                     */
                    if (!$exists) {
                        $this->Alert->warning('general.notExists');
                        return $this->redirect(['plugin' => 'Staff', 'controller' => 'Staff', 'action' => $alias]);
                    }
                }
            }
        } else {
            if ($model->alias() == 'ImportStaff') {
                $this->Navigation->addCrumb($model->getHeader($model->alias()));
                $header = __('Staff') . ' - ' . $model->getHeader($model->alias());
                $this->set('contentHeader', $header);
            } else {
                $this->Alert->warning('general.notExists');
                $event->stopPropagation();
                return $this->redirect(['plugin' => 'Staff', 'controller' => 'Staff', 'action' => 'index']);
            }
        }
    }

    public function beforePaginate(Event $event, Table $model, Query $query, ArrayObject $options)
    {
        $session = $this->request->session();

        if ($model->alias() != 'Staff') {
            if ($session->check('Staff.Staff.id')) {
                $userId = $session->read('Staff.Staff.id');
                if ($model->hasField('security_user_id')) {
                    $query->where([$model->aliasField('security_user_id') => $userId]);
                } else if ($model->hasField('staff_id')) {
                    $query->where([$model->aliasField('staff_id') => $userId]);
                }
            } else {
                $this->Alert->warning('general.noData');
                $event->stopPropagation();
                return $this->redirect(['action' => 'index']);
            }
        }
    }

    public function beforeQuery(Event $event, Table $model, Query $query, ArrayObject $extra)
    {
        $this->beforePaginate($event, $model, $query, $extra);
    }

    public function excel($id = 0)
    {
        $this->Staff->excel($id);
        $this->autoRender = false;
    }

    public function getUserTabElements($options = [])
    {
        $session = $this->request->session();
        $tabElements = $session->read('Institution.Staff.tabElements');
        return $this->TabPermission->checkTabPermission($tabElements);
    }

    public function getCareerTabElements($options = [])
    {
        $options['url'] = ['plugin' => 'Institution', 'controller' => 'Institutions'];
        $session = $this->request->session();
        if ($session->check('Staff.Staff.id')) {
            $userId = $session->read('Staff.Staff.id');
            $options['user_id'] = $userId;
        }
        if ($session->check('Institution.Institutions.id')) {
            $institutionId = $session->read('Institution.Institutions.id');
            $options['institution_id'] = $institutionId;
        }

        $tabElements = TableRegistry::get('Staff.Staff')->getCareerTabElements($options);
        return $this->TabPermission->checkTabPermission($tabElements);
    }

    public function getProfessionalTabElements($options = [])
    {
        $options['url'] = ['plugin' => 'Institution', 'controller' => 'Institutions'];
        $session = $this->request->session();
        if ($session->check('Staff.Staff.id')) {
            $userId = $session->read('Staff.Staff.id');
            $options['user_id'] = $userId;
        }
        $tabElements = TableRegistry::get('Staff.Staff')->getProfessionalTabElements($options);
        return $this->TabPermission->checkTabPermission($tabElements);
    }

    public function getFinanceTabElements($options = [])
    {
        $tabElements = [];
        $studentUrl = ['plugin' => 'Staff', 'controller' => 'Staff'];
        $studentTabElements = [
            'BankAccounts' => ['text' => __('Bank Accounts')],
            'Salaries' => ['text' => __('Salaries')],
        ];

        $tabElements = array_merge($tabElements, $studentTabElements);

        foreach ($studentTabElements as $key => $tab) {
            $tabElements[$key]['url'] = array_merge($studentUrl, ['action' => $key, 'index']);
        }
        return $this->TabPermission->checkTabPermission($tabElements);
    }

    public function getTrainingTabElements($options = [])
    {
        $tabElements = [];
        $studentUrl = ['plugin' => 'Staff', 'controller' => 'Staff'];
        $studentTabElements = [
            'TrainingResults' => ['text' => __('Training Results')],
            'TrainingNeeds' => ['text' => __('Training Needs')],
        ];

        $tabElements = array_merge($tabElements, $studentTabElements);

        foreach ($studentTabElements as $key => $tab) {
            $tabElements[$key]['url'] = array_merge($studentUrl, ['action' => $key, 'index']);
        }
        return $this->TabPermission->checkTabPermission($tabElements);
    }

    public function getInstitutionTrainingTabElements($options = [])
    {
        $tabElements = [];
        $trainingUrl = ['plugin' => 'Institution', 'controller' => 'Institutions'];
        $trainingTabElements = [
            'StaffTrainingNeeds' => ['text' => __('Needs')],
            'StaffTrainingApplications' => ['text' => __('Applications')],
            'StaffTrainingResults' => ['text' => __('Results')],
            'Courses' => ['text' => __('Courses')]
        ];

        $tabElements = array_merge($tabElements, $trainingTabElements);

        foreach ($trainingTabElements as $key => $tab) {
            $tabElements[$key]['url'] = array_merge($trainingUrl, ['action' => $key, 'index']);

            if ($key == 'Courses') {
                $trainingUrl = ['plugin' => 'Staff', 'controller' => 'Staff'];
                $tabElements[$key]['url'] = array_merge($trainingUrl, ['action' => $key, 'index']);
            }
        }

        return $this->TabPermission->checkTabPermission($tabElements);
    }

    public function getImage($id)
    {
        $this->autoRender = false;
        $this->ControllerAction->autoRender = false;
        $this->Image->getUserImage($id);
    }

    public function getStatusPermission($model)
    {
        $session = $this->request->session();
        $institutionId = $session->read('Institution.Institutions.id');

        $Institutions = TableRegistry::get('Institution.Institutions');
        $isActive = $Institutions->isActive($institutionId);

        // institution status is INACTIVE
        if (!$isActive) {
            if (in_array($model->alias(), $this->features)) { // check the feature list
                // off the import action
                if ($model->behaviors()->has('ImportLink')) {
                    $model->removeBehavior('ImportLink');
                }

                if ($model instanceof \App\Model\Table\ControllerActionTable) {
                    // CAv4 off the add/edit/remove action
                    $model->toggle('add', false);
                    $model->toggle('edit', false);
                    $model->toggle('remove', false);
                } else if ($model instanceof \App\Model\Table\AppTable) {
                    // CAv3 hide button and redirect when user change the Url
                    $model->addBehavior('ControllerAction.HideButton');
                }
            }
        }
    }
}
