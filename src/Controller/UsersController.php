<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function login()
    {
        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            if($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else{
                $this->Flash->error('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Los datos son invalidos, por favor intente nuevamente', ['params' =>[
                            'class' => 'alert alert-danger alert-dismissible fade show',
                            'escape' => false]]);
             }
        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());  
    }
    public function index()
    {
        /*
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));*/
        $columns = [
            [
                'field' => 'Users.id',
                'data' => 'id',
                'visible' => false,
                'searchable' => false,
            ],
            [
                'title' => __('Nombre'),
                'field' => 'Users.name',
                'data' => 'name',
                'searchable' => true,
            ],
            [
                'title' => __('Usuario'),
                'field' => 'Users.username',
                'data' => 'username'
            ],
            [
                'title' => __('Email'),
                'field' => 'Users.email',
                'data' => 'email'
            ],
            [
                'title' => __('Rol'),
                'field' => 'Users.role',
                'data' => 'role'
            ],
            
            
        ];
        
        $data = $this->DataTables->find('Users', 'all', [
            'contain' => [],
            'order' => ['username' => 'asc']
        ], $columns);
        
        $this->set('columns', $columns);
        $this->set('data', $data);
        $this->set('_serialize', array_merge($this->viewVars['_serialize'], ['data']));
    }

    public function exportTxtCsv($tipo = 'csv')
    {
        //$users = $this->Users->find('all');
        $users = $this->Users->find()->select(['Users.id', 'Users.name', 'Users.username', 'Users.email', 'Users.role', 'Users.active']);   
        $_serialize = 'users';
        $_header = ['Id', 'Nombre', 'Usuario', 'Email', 'Rol', 'Activo'];
        if($tipo === "csv"){
            $this->response = $this->response->withDownload('total-data.csv');
        }
        else if($tipo === "txt"){
            $this->response = $this->response->withDownload('total-data.txt');
        }
        $this->viewBuilder()->setClassName('CsvView.Csv');
        $this->set(compact('users', '_serialize', '_header'));
    }

    public function exportExcel(){
        $datatbl = '';
        $datatbl = '<table cellspacing = "2" cellpadding = "5" style = "border:2px;text-align:center;" border = "1" width = "60%" >';
        $datatbl .= '
                    <tr>
                        <th style="text-align:center;">Id</th>
                        <th style="text-align:center;">Nombre</th>
                        <th style="text-align:center;">Usuario</th>
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Rol</th>
                        <th style="text-align:center;">Activo</th>
                    </tr>
                    ';
        $users = $this->Users->find()->select(['Users.id', 'Users.name', 'Users.username', 'Users.email', 'Users.role', 'Users.active'])->toArray();
        debug(users);
        foreach($users as $user){

            $id = $user['id'];
            $name = $user['name'];
            $username = $user['username'];
            $email = $user['email'];
            $role = $user['role'];
            $active = $user['active'];
            $datatbl .='<tr>
                            <td style="text-align:center;">'. $id. '</td>
                            <td style="text-align:center;">'. $name. '</td>
                            <td style="text-align:center;">'. $username. '</td>
                            <td style="text-align:center;">'. $email. '</td>
                            <td style="text-align:center;">'. $role. '</td>
                            <td style="text-align:center;">'. $active. '</td>
                        </tr>';
        }
        $datatbl .= "</table>";
        header('Content-Type: application/force-download');
        header('Content-disposition: attachment;filename= total-data.xls');
        header("Pragma: ");
        header("Cache-Control: ");
        echo $datatbl;
        die;
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    
    public function add()
    {
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity($this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('<span type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>Los datos se agregaron correctamente', ['params' =>[
                    'class' => 'alert alert-success alert-dismissible fade show',
                    'escape' => false]]);
                return $this->redirect(['action' => 'index']);
            }
            else{
                $message = 'Error';
                $this->set([
                    'message' => $message,
                    'recipe' => $recipe,
                    '_serialize' => ['message', 'recipe']
                ]);
                $this->Flash->error('<span type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>Los datos no se han guardado, por favor intente nuevamente', ['params' =>[
                    'class' => 'alert alert-danger alert-dismissible fade show',
                    'escape' => false]]);
            }
            $this->set(compact('user'));
            
        }

    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('<span type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>Los datos se han editado correctamente!', ['params' =>[
                    'class' => 'alert alert-success alert-dismissible fade show',
                    'escape' => false]]);
                return $this->redirect(['action' => 'index']);
            }
            $message = 'Error';
            $this->set([
                'message' => $message,
                'recipe' => $recipe,
                '_serialize' => ['message', 'recipe']
            ]);
            $this->Flash->error('<span type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>Los datos no se han editado, por favor intente nuevamente', ['params' =>[
                'class' => 'alert alert-danger alert-dismissible fade show',
                'escape' => false]]);
        }
        //$this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('<span type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>Los datos se han eliminado correctamente!', ['params' =>[
                'class' => 'alert alert-success alert-dismissible fade show',
                'escape' => false]]);
        } else {
            $this->Flash->error('<span type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Los datos no se han eliminado, por favor intente nuevamente', ['params' =>[
                'class' => 'alert alert-danger alert-dismissible fade show',
                'escape' => false]]);
        }

        return $this->redirect(['action' => 'index']);
    }
}
