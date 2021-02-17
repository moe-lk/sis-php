<?php
namespace Examination\Controller;

use Examination\Controller\AppController;

/**
 * Examinations Controller
 *
 * @property \Examination\Model\Table\ExaminationsTable $Examinations
 */
class ExaminationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
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
        // $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Examination.Examinations']);
    }

    public function examCentres()
    {
        // $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Examination.ExamCenters']);
    }

    public function registeredStudents()
    {
        // $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Examination.registeredStudents']);
    }

    public function examResults()
    {
        // $this->ControllerAction->process(['alias' => __FUNCTION__, 'className' => 'Examination.registeredStudents']);
    }

}
