<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {

			  $this->paginate = [
					'contain' => ['ProductOwner', 'ProductCreatedBy', 'Sales'],
					'sortWhitelist' => [
						'id',
						'name',
						'ProductOwner.name',
						'ProductCreatedBy.name',
						'price',
						'created',
						'modified'
						]
				];

				if (!empty($_GET['owner'])){
					$this->request->data['owner'] = $_GET['owner'];
					$this->paginate['conditions'] = ['owner' => $_GET['owner']];
				}
        $this->set('products', $this->paginate($this->Products));
        $this->set('_serialize', ['products']);
        $users = $this->Products->ProductOwner->find('list');
        $this->set('users', $users);
    }


  public function sold($owner = null){
    //~ die('Under Construction. <a href="javascript:history.back(-1)">Back</a>');


		if (!empty($_GET['owner'])){
			$this->request->data['owner'] = $_GET['owner'];

			$sales = $this->Products->find('all', [
				'conditions' => [
					'Products.owner' => $_GET['owner'],
					'Products.sale_id IS NOT NULL'
				]
			])->contain(['ProductSales']);
			$this->set('sales', $sales);
		}

		$users = $this->Products->ProductOwner->find('list');
		$this->set('users', $users);

  }


    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Sales', 'ProductOwner', 'ProductCreatedBy']
        ]);
        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
						$this->request->data['created_by'] = (string)$this->Auth->User('id');
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $users = $this->Products->ProductOwner->find('list', ['limit' => 200]);
        $this->request->data['owner'] = (string)$this->Auth->User('id');
        $this->set(compact('product', 'users'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Sales', 'ProductOwner', 'ProductCreatedBy']
        ]);
        $this->request->data['created_by'] = $product->created_by;
        $this->request->data['string_product_created_by'] = $product->product_created_by->name;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $users = $this->Products->ProductOwner->find('list', ['limit' => 200]);
        $this->set(compact('product', 'users'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function generateQRCode($id = null){

			if (is_null($id)){
				$products = $this->Products->find('all', ['fields' => 'id']);
			}else{
				$products = $this->Products->get($id, ['fields' => 'id']);
			}

			debug($products);

		}

    public function printlabels($id = null){

			if (is_null($id)){
				$products = $this->Products->find('all', ['contain' => ['ProductOwner']] );
			}else{
				$products = $this->Products->get($id, ['contain' => ['ProductOwner']]);
			}
      $this->set(compact('products'));
      $this->viewBuilder()->layout('print');
    }


}
