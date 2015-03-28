<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Novels Controller
 *
 * @property \App\Model\Table\NovelsTable $Novels
 */
class NovelsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('novels', $this->paginate($this->Novels));
        $this->set('_serialize', ['novels']);
    }

    /**
     * View method
     *
     * @param string|null $id Novel id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $novel = $this->Novels->get($id, [
            'contain' => ['Contents']
        ]);
        $this->set('novel', $novel);
        $this->set('_serialize', ['novel']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $novel = $this->Novels->newEntity();
        if ($this->request->is('post')) {
            $novel = $this->Novels->patchEntity($novel, $this->request->data);
            if ($this->Novels->save($novel)) {
                $this->Flash->success('The novel has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The novel could not be saved. Please, try again.');
            }
        }
        $this->set(compact('novel'));
        $this->set('_serialize', ['novel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Novel id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $novel = $this->Novels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $novel = $this->Novels->patchEntity($novel, $this->request->data);
            if ($this->Novels->save($novel)) {
                $this->Flash->success('The novel has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The novel could not be saved. Please, try again.');
            }
        }
        $this->set(compact('novel'));
        $this->set('_serialize', ['novel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Novel id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $novel = $this->Novels->get($id);
        if ($this->Novels->delete($novel)) {
            $this->Flash->success('The novel has been deleted.');
        } else {
            $this->Flash->error('The novel could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
