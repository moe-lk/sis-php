<?php
namespace App\Controller;

use ArrayObject;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Utility\Inflector;
use Cake\ORM\Table;
use App\Controller\AppController;
use Cake\Core\Configure;
use DateTime;
use function Complex\sec;

class DashboardController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        // $this->ControllerAction->model('Notices');
        // $this->loadComponent('Paginator');

        $this->attachAngularModules();
    }

    // CAv4
    public function StudentWithdraw()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Institution.StudentWithdraw']);
    }
    // end of CAv4

    public function implementedEvents()
    {
        $events = parent::implementedEvents();
        $events['Controller.SecurityAuthorize.isActionIgnored'] = 'isActionIgnored';
        return $events;
    }

    public function isActionIgnored(Event $event, $action)
    {
        return true;
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $user = $this->Auth->user();
        $userData = TableRegistry::get("security_users")->get($user['id']);
        try {
            date_default_timezone_set('Asia/Colombo');
            $start_date = new DateTime($userData->security_timeout->format('Y-m-d h:i:s a'));
            $since_start = $start_date->diff(new DateTime(date('Y-m-d h:i:s a', time())));
            $totMonths = $since_start->y *12;
            $totMonths += $since_start->m;
        } catch (\Exception $e) {
            error_log($e);
        }

        if ((is_array($user) && array_key_exists('last_login', $user) && is_null($user['last_login'])) || ($totMonths >= 3)) {
            $userInfo = TableRegistry::get('User.Users')->get($user['id']);
            if ($userInfo->password) {
                $this->Alert->warning('security.login.changePassword');
                $lastLogin = $userInfo->last_login;
                $this->request->session()->write('Auth.User.last_login', $lastLogin);
                $this->redirect(['plugin' => 'Profile', 'controller' => 'Profiles', 'action' => 'Accounts', 'edit', $this->ControllerAction->paramsEncode(['id' => $user['id']])]);
            }

        }
        $header = __('Home Page');
        $this->set('contentHeader', $header);
    }

    public function onInitialize(Event $event, Table $model, ArrayObject $extra)
    {
        // set header
        $header = $model->getHeader($model->alias);
        $this->set('contentHeader', $header);
    }

    public function index()
    {
        $excludedTable = [];
        if (in_array('Trainings', (array)Configure::read('School.excludedPlugins'))) {
            $excludedTable[] = 'StaffTrainingApplicationsTable';
            $excludedTable[] = 'TrainingCoursesTable';
            $excludedTable[] = 'TrainingSessionsTable';
            $excludedTable[] = 'TrainingSessionResultsTable';
            $excludedTable[] = 'StaffTrainingNeedsTable';
            $excludedTable[] = 'StaffTrainingApplicationsTable';
            $excludedTable[] = 'StaffTrainingApplicationsTable';
            $excludedTable[] = 'StaffTrainingApplicationsTable';
            $excludedTable[] = 'StaffTrainingApplicationsTable';
        }

        if (in_array('Surveys', (array)Configure::read('School.excludedPlugins'))) {
            $excludedTable[] = 'InstitutionSurveysTable';
        }

        if (in_array('Qualities', (array)Configure::read('School.excludedPlugins'))) {
            $excludedTable[] = 'VisitRequestsTable';
        }

        if (in_array('Cases', (array)Configure::read('School.excludedPlugins'))) {
            $excludedTable[] = 'CasesTable';
        }

        if (Configure::read('schoolMode')) {
            $excludedTable[] = 'StudentTransferApprovalTable';
            $excludedTable[] = 'StaffTransferIn';
            $excludedTable[] = 'StaffTransferOut';
        }
        $this->set('ngController', 'DashboardCtrl as DashboardController');
        $this->set('excludedTable', json_encode($excludedTable));
        $this->set('noBreadcrumb', true);
    }

    private function attachAngularModules()
    {
        $action = $this->request->action;

        switch ($action) {
            case 'index':
                $this->Angular->addModules([
                    'alert.svc',
                    'dashboard.ctrl',
                    'dashboard.svc'
                ]);
                break;
        }
    }
}
