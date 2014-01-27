<?php

App::uses('AppController', 'Controller');

/**
 * Books Controller
 *
 * @property Book $Book
 * @property PaginatorComponent $Paginator
 */
class BooksController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Book->recursive = 0;
        $this->set('books', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Book->exists($id)) {
            throw new NotFoundException(__('Invalid book'));
        }
        $options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
        $book = $this->Book->find('first', $options);
        $this->set('book', $book);
        $this->loadModel('Particular');
        $this->Filter->addFilters(
                array(
                    'filter1' => array(
                        'Particular.activity_id' => array(
                            'select' => $this->Filter->select('-Pilih-', $this->Particular->Activity->find('list'))
                        )
                    ),
                    'filter2' => array(
                        'Particular.invoice' => array(
                            'operator' => 'LIKE',
                            'value' => array(
                                'before' => '%', // optional
                                'after' => '%'  // optional
                            ),
                            'Particular.book_id' => array('value' => $id)
                        )
                    ),
                    
                )
        );

        $this->Filter->setPaginate('order', 'Particular.created ASC'); // optional
        $this->Filter->setPaginate('limit', 9999);              // optional        
        $this->Filter->setPaginate('conditions', $this->Filter->getConditions());

        $data = $this->Paginator->paginate('Particular', array('Particular.book_id' => $id), array('order' => array('Particular.created')));
        $this->set('particulars', $data);
        $activities = $this->Particular->Activity->find('all');
        $this->set(compact('activities'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function preview($id = null, $activity = null) {
        $this->layout = 'report';
        if (!$this->Book->exists($id)) {
            throw new NotFoundException(__('Invalid book'));
        }
        $options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
        $book = $this->Book->find('first', $options);
        $this->set('book', $book);
        $particulars = $this->Book->Particular->find('all', array('conditions' => array('Particular.activity_id' => $activity, 'Particular.book_id' => $id), 'order' => array('Particular.created')));
        $activities = $this->Book->Particular->Activity->find('first', array('conditions' => array('Activity.id' => $activity)));
        $this->set(compact('particulars', 'activities'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Book->create();
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('The book has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The book could not be saved. Please, try again.'), 'flash/error');
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Book->exists($id)) {
            throw new NotFoundException(__('Invalid book'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('The book has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The book could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
            $this->request->data = $this->Book->find('first', $options);
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
        $this->Book->id = $id;
        if (!$this->Book->exists()) {
            throw new NotFoundException(__('Invalid book'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Book->delete()) {
            $this->Session->setFlash(__('Book deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Book was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
