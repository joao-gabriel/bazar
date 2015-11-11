<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sales Controller
 *
 * @property \App\Model\Table\SalesTable $Sales
 */
class SalesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'SalesRegisteredBy']
        ];
        $this->set('sales', $this->paginate($this->Sales));
        $this->set('_serialize', ['sales']);
    }

    /**
     * View method
     *
     * @param string|null $id Sale id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => ['Products', 'SalesRegisteredBy']
        ]);
        $this->set('sale', $sale);
        $this->set('_serialize', ['sale']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
				die('Under Construction. <a href="javascript:history.back(-1)">Back</a>');
        $sale = $this->Sales->newEntity();
        if ($this->request->is('post')) {
          $this->request->data['product_id'] = $productId;
          $this->request->data['registered_by'] = (string)$this->Auth->User('id');
            $sale = $this->Sales->patchEntity($sale, $this->request->data);
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sale could not be saved. Please, try again.'));
            }
        }
        $product = $this->Sales->Products->get($productId);
        $this->request->data['product_name'] = $product->name;
        $this->request->data['sale_price'] = $product->price;
        $this->set(compact('sale', 'product'));
        $this->set('_serialize', ['sale']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sale = $this->Sales->patchEntity($sale, $this->request->data);
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sale could not be saved. Please, try again.'));
            }
        }
        $products = $this->Sales->Products->find('list', ['limit' => 200]);
        $this->set(compact('sale', 'products'));
        $this->set('_serialize', ['sale']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sale = $this->Sales->get($id);
        if ($this->Sales->delete($sale)) {
            $this->Flash->success(__('The sale has been deleted.'));
        } else {
            $this->Flash->error(__('The sale could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
