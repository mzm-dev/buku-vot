<?php

App::uses('AppController', 'Controller');

/**
 * Particulars Controller
 *
 * @property Particular $Particular
 * @property PaginatorComponent $Paginator
 */
class ParticularsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Math');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Particular->recursive = 0;
        $this->set('particulars', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Particular->exists($id)) {
            throw new NotFoundException(__('Invalid particular'));
        }
        $options = array('conditions' => array('Particular.' . $this->Particular->primaryKey => $id));
        $this->set('particular', $this->Particular->find('first', $options));
    }

    /**
     * add method
     * @param string $id
     * @return void
     */
    public function add($id = null) {
        $book = $this->_loadBook($id);
        if (!$this->Particular->Book->exists($id)) {
            $this->Session->setFlash(__('Invalid particular.'), 'flash/error');
            $this->redirect(array('controller' => 'books', 'action' => 'index'));
        }
        if ($this->request->is('post')) {
            $this->Particular->create();
            if (!empty($this->request->data)) {
                switch ($this->request->data['Particular']['category_id']):
                    case 1:
                        $currBalance = $this->Math->getCurrBalance($this->request->data['Particular']['row_td'], $book);
                        $currTbs1 = $this->Math->getCurrTbs($this->request->data['Particular']['row_td'], 1, $book);
                        $this->Particular->Book->updateAll(array(
                            'Book.curr_tbs' => $currTbs1,
                            'Book.curr_td' => $this->request->data['Particular']['row_td'],
                            'Book.curr_balance' => $currBalance), array('Book.id' => $id));
                        $this->request->data['Particular']['balance'] = $currBalance;
                        $this->request->data['Particular']['row_tbs'] = $currTbs1;
                        $this->request->data['Particular']['expense'] = $book['Book']['curr_expense'];
                        break;
                    case 2:
                        $currBalance = $this->Math->getCurrBalance($this->request->data['Particular']['debit'], $book);
                        $currExpense = $this->Math->getCurrExpense($this->request->data['Particular']['debit'], $book);
                        #$currTbs2 = $this->Math->getCurrTbs($this->request->data['Particular']['row_td'], 2, $book);
                        $this->Particular->Book->updateAll(array(
                            'Book.curr_expense' => $currExpense,
                            'Book.curr_balance' => $currBalance), array('Book.id' => $id));
                        $this->request->data['Particular']['balance'] = $currBalance;
                        $this->request->data['Particular']['expense'] = $currExpense;
                        #$this->request->data['Particular']['row_td'] = $book['Book']['curr_td'];
                        $this->request->data['Particular']['row_tbs'] = $book['Book']['curr_tbs'];

                        break;
                    case 3:
                        $currExpense = $this->Math->getCurrExpense($this->request->data['Particular']['debit'], $book);
                        $currTbs2 = $this->Math->getCurrTbs($this->request->data['Particular']['debit'], null, $book);
                        $this->Particular->Book->updateAll(array(
                            'Book.curr_expense' => $currExpense,
                            'Book.curr_tbs' => $currTbs2), array('Book.id' => $id));
                        $this->Particular->updateAll(array(                            
                            'Particular.status' => '1'), array('Particular.id' => $this->request->data['Particular']['parent_id']));
                        $this->request->data['Particular']['expense'] = $currExpense;
                        $this->request->data['Particular']['row_tbs'] = $currTbs2;                        
                        $this->request->data['Particular']['balance'] = $book['Book']['curr_balance'];
                        break;
                endswitch;                
            }


            if ($this->Particular->save($this->request->data)) {
                $this->Session->setFlash(__('The particular has been saved'), 'flash/success');
                $this->redirect(array('controller' => 'books', 'action' => 'view', $id));
            } else {
                $this->Session->setFlash(__('The particular could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $parentparticulars = $this->Particular->Parentparticular->find('list', array('conditions' => array('Parentparticular.category_id' => 1, 'Parentparticular.status'=>0), 'fields' => array('Parentparticular.id', 'Parentparticular.desc'),));
        $books = $this->Particular->Book->find('list', array('conditions' => array('Book.id' => $id)));
        $categories = $this->Particular->Category->find('list');
        $this->set(compact('books', 'parentparticulars', 'categories'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Particular->exists($id)) {
            throw new NotFoundException(__('Invalid particular'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->request->data)) {
                $this->_loadBook($id);
                if ($this->request->data['Particular']['category_id'] == 1):
                    $this->Math->tanggungan($id, $this->request->data['Particular']['row_td']);
                    $this->request->data['Particular']['row_tbs'] = $this->Math->curr_tbs($this->request->data['Particular']['row_td'], 1);
                else:
                    $this->Math->bayaran($id, $this->request->data['Particular']['debit']);
                    $this->request->data['Particular']['row_tbs'] = $this->Math->curr_tbs($this->request->data['Particular']['debit'], 2);
                endif;
            }
            $this->request->data['Particular']['balance'] = $this->Math->curr_balance($this->request->data['Particular']['debit']);
            $this->request->data['Particular']['expense'] = $this->Math->curr_expense($this->request->data['Particular']['debit']);

            if ($this->Particular->save($this->request->data)) {
                $this->Session->setFlash(__('The particular has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The particular could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Particular.' . $this->Particular->primaryKey => $id));
            $this->request->data = $this->Particular->find('first', $options);
        }
          $parentparticulars = $this->Particular->Parentparticular->find('list', array('conditions' => array('Parentparticular.category_id' => 1, 'Parentparticular.status'=>0), 'fields' => array('Parentparticular.id', 'Parentparticular.desc'),));
        $books = $this->Particular->Book->find('list', array('conditions' => array('Book.id' => $this->request->data['Particular']['book_id'])));
        #$books = $this->Particular->Book->find('list');
        $categories = $this->Particular->Category->find('list');        
        $this->set(compact('books', 'parentparticulars', 'categories'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Particular->id = $id;
        if (!$this->Particular->exists()) {
            throw new NotFoundException(__('Invalid particular'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Particular->delete()) {
            $this->Session->setFlash(__('Particular deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Particular was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    private function _loadBook($id) {
        $this->Particular->Book->recursive = 0;
        $options = array('conditions' => array('Book.id' => $id));
        return $book = $this->Particular->Book->find('first', $options);
//        $this->Session->write(array('Book' => array(
//                'amount' => $book['Book']['amount'],
//                'curr_balance' => $book['Book']['curr_balance'],
//                'curr_expense' => $book['Book']['curr_expense'],
//                'curr_tbs' => $book['Book']['curr_tbs'],
//                )));
        #$this->set('book', $book);
    }

    public function ajax_tbs($id = null) {
#        $particulars = $this->Particular->find('all', array('conditions'=>array('Particular.id'=>$id)));
        $options = array('conditions' => array('Particular.id' => $id));
        $particular = $this->Particular->find('first', $options);
        $result = array(
            'status' => 'success',
            'particular' => $particular['Particular']['row_td'],
            'text' => $particular['Particular']['text'],
        );

        echo json_encode($result);

        Configure::write('debug', 0);
        $this->autoRender = false;
        exit();
    }

}
