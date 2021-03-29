<?php
namespace Examination\Controller;

use Examination\Controller\AppController;

use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Network\Response;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;
use Cake\Routing\Router;
use Cake\I18n\Date;
use Cake\Controller\Exception\SecurityException;
use Cake\Core\Configure;
use App\Model\Traits\OptionsTrait;
use ControllerAction\Model\Traits\UtilityTrait;
/**
 * Examinations Controller
 *
 * @property \Examination\Model\Table\ExaminationsTable $Examinations
 */
class ExaminationsController extends AppController
{
    use OptionsTrait;
    use UtilityTrait;
    public $activeObj = null;
    private $features = [
        'ExaminationCentres',
        'Examinations',
        'ExaminationCentreRooms',
        'ExaminationCentreRoomsExaminationsInvigilators',
        'ExaminationCentreRoomsExaminationsStudents',
        'ExaminationCentreRoomsExaminations',
        'ExaminationCentresExaminationsInstitutions',
        'ExaminationCentresExaminationsInvigilators',
        'ExaminationCentresExaminationsStudents',
        'ExaminationCentresExaminationsSubjectsStudents',
        'ExaminationCentresExaminationsSubjects',
        'ExaminationCentresExaminations',
        'ExaminationCentreSpecialNeeds',
        'ExaminationGradingOptions',
        'ExaminationGradingTypes',
        'ExaminationResults',
        'ExaminationItems',
        'ExaminationStudents'
    ];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize(){
        parent::initialize();
        // $this->ControllerAction->model('Institution.Institutions', [], ['deleteStrategy' => 'restrict']);
        $this->ControllerAction->models = [
            // 'Attachments'       => ['className' => 'Examination.ExaminationAttachments'],

            'ExaminationCentres'   => ['className' => 'Examination.ExaminationCentres', 'actions' => ['view', 'edit']],
            'Examinations' => ['className' => 'Examination.Examinations', 'actions' => ['view', 'edit']],
            'ExaminationCentrRooms'   => ['className' => 'Examination.ExaminationCentreRooms', 'actions' => ['view', 'edit']],
            'ExaminationCentreRoomsExaminationsInvigilators' => ['className' => 'Examination.ExaminationCentreRoomsExaminationsInvigilators', 'actions' => ['view', 'edit']],
            'ExaminationCentreRoomsExaminationsStudents' => ['className' => 'ExaminationCentreRoomsExaminationsStudents', 'actions' => ['view', 'edit']],
            'ExaminationCentreRoomsExaminations' => ['className' => 'ExaminationCentreRoomsExaminations', 'actions' => ['view', 'edit']],
            'ExaminationCentresExaminationsInstitutions' => ['className' => 'ExaminationCentresExaminationsInstitutions', 'actions' => ['view', 'edit']],
            'ExaminationCentresExaminationsInvigilators' => ['className' => 'ExaminationCentresExaminationsInvigilators', 'actions' => ['view', 'edit']],
            'ExaminationCentresExaminationsStudents' => ['className' => 'ExaminationCentresExaminationsStudents', 'actions' => ['view', 'edit']],
            'ExaminationCentresExaminationsSubjectsStudents' => ['className' => 'ExaminationCentresExaminationsSubjectsStudents', 'actions' => ['view', 'edit']],
            'ExaminationCentresExaminationsSubjects' => ['className' => 'ExaminationCentresExaminationsSubjects', 'actions' => ['view', 'edit']],
            'ExaminationCentresExaminations' => ['className' => 'ExaminationCentresExaminations', 'actions' => ['view', 'edit']],
            'ExaminationCentreSpecialNeeds' => ['className' => 'ExaminationCentreSpecialNeeds', 'actions' => ['view', 'edit']],
            'ExaminationGradingOptions' => ['className' => 'ExaminationGradingOptions', 'actions' => ['view', 'edit']],
            'ExaminationGradingTypes' => ['className' => 'ExaminationGradingTypes', 'actions' => ['view', 'edit']],
            'ExaminationResults' => ['className' => 'ExaminationResults', 'actions' => ['view', 'edit']],
            'ExaminationItems' => ['className' => 'ExaminationItems', 'actions' => ['view', 'edit']],
            'ExaminationStudents' => ['className' => 'ExaminationStudents', 'actions' => ['view', 'edit']],

        ];
        // dd($this);
    }

    public function index()
    {
        $examinations = $this->paginate($this->Examinations);

        $this->set(compact('examinations'));
        $this->set('_serialize', ['examinations']);
        // dd($examinations);
    }
    
    /**
     * View method
     *
     * @param string|null $id Examination id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examination = $this->Examinations->get($id, [
            'contain' => []
        ]);

        $this->set('examination', $examination);
        $this->set('_serialize', ['examination']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examination = $this->Examinations->newEntity();
        if ($this->request->is('post')) {
            $examination = $this->Examinations->patchEntity($examination, $this->request->data);
            if ($this->Examinations->save($examination)) {
                $this->Flash->success(__('The examination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examination could not be saved. Please, try again.'));
        }
        $this->set(compact('examination'));
        $this->set('_serialize', ['examination']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Examination id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examination = $this->Examinations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examination = $this->Examinations->patchEntity($examination, $this->request->data);
            if ($this->Examinations->save($examination)) {
                $this->Flash->success(__('The examination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examination could not be saved. Please, try again.'));
        }
        $this->set(compact('examination'));
        $this->set('_serialize', ['examination']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Examination id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examination = $this->Examinations->get($id);
        if ($this->Examinations->delete($examination)) {
            $this->Flash->success(__('The examination has been deleted.'));
        } else {
            $this->Flash->error(__('The examination could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function exams()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Examination.Examinations']);
    }

    public function examCentres()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Examination.ExaminationCentres']);
        // dd($this);
    }

    public function registeredStudents()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Examination.ExaminationStudents']);

    }

    public function examResults()
    {
        $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Examination.ExaminationResults']);
    }

}
