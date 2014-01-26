<?php

App::uses('AppController', 'Controller');

/**
 * Types Controller
 *
 * @property Types $Types
 * @property PaginatorComponent $Paginator
 */
class TypesController extends AppController {

    public function ajax_add_type() {
        $this->layout = 'ajax';
    }

    public function ajax_add() {
        if (!empty($this->data)) {

            $this->Type->create();
            if ($this->Type->save($this->data)) {

                $result = array(
                    'status' => 'berjaya',
                    'message' => __('The type has been saved', true),
                    'id' => $this->Type->getInsertID()
                );

                echo json_encode($result);

                Configure::write('debug', 0);
                $this->autoRender = false;
                exit();
            } else {

                $result = array(
                    'status' => 'error',
                    'message' => __('The type could not be saved.', true)
                );

                echo json_encode($result);

                Configure::write('debug', 0);
                $this->autoRender = false;
                exit();
            }
        }
    }

}
