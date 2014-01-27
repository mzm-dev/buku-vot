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
                $currBalance = $this->Math->getCurrBalance($this->request->data['Particular']['debit'], $book);
                $currExpense = $this->Math->getCurrExpense($this->request->data['Particular']['debit'], $book);
                $this->Particular->Book->updateAll(array(
                    'Book.curr_expense' => $currExpense,
                    'Book.curr_balance' => $currBalance), array('Book.id' => $id));
                $this->request->data['Particular']['balance'] = $currBalance;
                $this->request->data['Particular']['expense'] = $currExpense;
                $this->request->data['Particular']['user_id'] = $this->Session->read('Auth.User.id');
                $this->request->data['Particular']['activity_id'] = 1;
            }


            if ($this->Particular->save($this->request->data)) {
                $this->Session->setFlash(__('The particular has been saved'), 'flash/success');
                $this->redirect(array('controller' => 'books', 'action' => 'view', $id));
            } else {
                $this->Session->setFlash(__('The particular could not be saved. Please, try again.'), 'flash/error');
            }
        }
        #$parentparticulars = $this->Particular->Parentparticular->find('list', array('conditions' => array( 'Parentparticular.status' => 0), 'fields' => array('Parentparticular.id', 'Parentparticular.desc'),));
        $books = $this->Particular->Book->find('list', array('conditions' => array('Book.id' => $id)));
        $types = $this->Particular->Type->find('list');
        $users = $this->Particular->User->find('list');
        $this->set(compact('books', 'types', 'user'));
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
            throw new NotFoundException(__('Invalid book'));
        }
        $alls = $this->Particular->find('all', array('conditions' => array('Particular.id >=' => $id), 'recursive' => 0));
        $curr = $this->Particular->find('first', array('conditions' => array('Particular.id' => $id), 'recursive' => 0));

        if ($this->request->is('post') || $this->request->is('put')) {
            $book = $this->_loadBook($this->request->data['Particular']['book_id']);
            if ($this->Particular->save($this->request->data)) {
                #$this->__debit($this->request->data['Particular']['debit'],$only,$this->request->data['Particular']['book_id'], $book['Book']['curr_expense'], $book['Book']['curr_balance']);
                $this->__debit($this->request->data['Particular']['debit'], $curr['Particular']['debit'], $alls, $this->request->data['Particular']['book_id'], $book['Book']['curr_expense'], $book['Book']['curr_balance']);
                //if ($this->Session->read('Auth.User.group_id') >= 2) {
                 //   $this->__kredit($this->request->data['Particular']['credit'], $alls, $this->request->data['Particular']['book_id'], $book['Book']['curr_expense'], $book['Book']['curr_balance']);
                //}
                $this->Session->setFlash(__('The book has been saved'), 'flash/success');
                $this->redirect(array('controller' => 'books', 'action' => 'view', $this->request->data['Particular']['book_id']));
            } else {
                $this->Session->setFlash(__('The book could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Particular.' . $this->Particular->primaryKey => $id));
            $this->request->data = $this->Particular->find('first', $options);
        }
        $books = $this->Particular->Book->find('list', array('conditions' => array('Book.id' => $this->request->data['Particular']['book_id'])));
        $types = $this->Particular->Type->find('list');
        $activities = $this->Particular->Activity->find('list');
        $this->set(compact('books', 'types', 'activities'));
    }

    private function __debit($debit, $curr, $alls, $bookid, $curr_expense, $curr_balance) {


        if ($debit > $curr):
            $new1 = $debit - $curr;
            $this->Particular->Book->updateAll(array(
                'Book.curr_expense' => $curr_expense + $new1,
                'Book.curr_balance' => $curr_balance - $new1), array('Book.id' => $bookid)
            );
            foreach ($alls as $all):
                $this->Particular->updateAll(array(
                    'Particular.expense' => $all['Particular']['expense'] + $new1,
                    'Particular.balance' => $all['Particular']['balance'] - $new1,
                        ), array('Particular.id' => $all['Particular']['id']));
            endforeach;
        elseif ($debit < $curr):
            $new2 = $curr - $debit;
            $this->Particular->Book->updateAll(array(
                'Book.curr_expense' => $curr_expense - $new2,
                'Book.curr_balance' => $curr_balance + $new2), array('Book.id' => $bookid)
            );
            foreach ($alls as $all):
                $this->Particular->updateAll(array(
                    'Particular.expense' => $all['Particular']['expense'] - $new2,
                    'Particular.balance' => $all['Particular']['balance'] + $new2,
                        ), array('Particular.id' => $all['Particular']['id']));
            endforeach;
        else:

        endif;
    }

    private function __kredit($credit, $alls, $bookid, $curr_expense, $curr_balance) {
        if (!empty($credit) && $this->Session->read('Auth.User.group_id') <= 2) {
            $this->Particular->Book->updateAll(array(
                'Book.curr_expense' => $curr_expense - $credit,
                'Book.curr_balance' => $curr_balance + $credit), array('Book.id' => $bookid)
            );
            foreach ($alls as $all):
                $this->Particular->updateAll(array(
                    'Particular.expense' => $all['Particular']['expense'] - $credit,
                    'Particular.balance' => $all['Particular']['balance'] + $credit,
                        ), array('Particular.id' => $all['Particular']['id']));
            endforeach;
        }
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
    }

}
