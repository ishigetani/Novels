<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contents Controller
 *
 * @property \App\Model\Table\ContentsTable $Contents
 */
class ContentsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Novels']
        ];
        $this->set('contents', $this->paginate($this->Contents));
        $this->set('_serialize', ['contents']);
    }

    /**
     * View method
     *
     * @param string|null $id Content id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => ['Novels']
        ]);
        $this->set('content', $content);
        $this->set('_serialize', ['content']);
    }

    /**
     * @param null $id
     * @return void
     */
    public function read($id = null)
    {
        $this->layout = 'main';

        $this->loadModel('Novels');
        $novel = $this->Novels->get($id);
        $this->set('novel', $novel);

        $this->paginate = [
            'contain' => ['Novels'],
            'conditions' => array('novel_id' => $id),
            'limit' => 1
        ];
        $this->set('contents', $this->paginate($this->Contents));
        $this->set('_serialize', ['contents', 'novel']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $content = $this->Contents->newEntity();
        if ($this->request->is('post')) {
            $content = $this->Contents->patchEntity($content, $this->request->data);
            if ($this->Contents->save($content)) {
                $this->Flash->success('The content has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The content could not be saved. Please, try again.');
            }
        }
        $novels = $this->Contents->Novels->find('list', ['limit' => 200]);
        $this->set(compact('content', 'novels'));
        $this->set('_serialize', ['content']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Content id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $content = $this->Contents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $content = $this->Contents->patchEntity($content, $this->request->data);
            if ($this->Contents->save($content)) {
                $this->Flash->success('The content has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The content could not be saved. Please, try again.');
            }
        }
        $novels = $this->Contents->Novels->find('list', ['limit' => 200]);
        $this->set(compact('content', 'novels'));
        $this->set('_serialize', ['content']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Content id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $content = $this->Contents->get($id);
        if ($this->Contents->delete($content)) {
            $this->Flash->success('The content has been deleted.');
        } else {
            $this->Flash->error('The content could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
