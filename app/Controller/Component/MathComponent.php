<?php

/*
 * Kesimpulan : 
 * 1. Aktiviti Rekod Tanggungan Dikenakan 
 * - xDEBIT, ^TD, ^TBS, xBERSIH, ^Baki 
 * 
 * 2. Aktiviti Rekod Debit Terus 
 * - ^DEBIT, xTD, xTBS, ^BERSIH, ^Baki 
 * 
 * 3. Aktiviti Rekod Debit Tanggungan Belum Selesi 
 * - ^DEBIT, xTD, ^TBS, ^BERSIH, xBaki
 */
App::uses('Component', 'Controller');

class MathComponent extends Component {

    var $curr_balance;
    var $curr_expense;

    public function initialize(Controller $controller) {
        $this->controller = $controller;
        $this->model = ClassRegistry::init('Book');
    }

    function bayaran($id = null, $debit = null) {
        $this->model->updateAll(
                array(
            'Book.curr_expense' => $this->getCurrExpense($debit),
            'Book.curr_balance' => $this->getCurrBalance($debit),
            'Book.curr_tbs' => $this->getCurrTbs($debit)
                ), array('Book.id' => $id)
        );
    }

    function getCurrBalance($tb_amount = null, $book = null) {

        if (!empty($book['Book']['curr_balance'])) {
            return $this->curr_balance = $book['Book']['curr_balance'] - $tb_amount;
        } else {
            return $this->curr_balance = $book['Book']['amount'] - $tb_amount;
        }
    }

    function getCurrExpense($debit_amount = null, $book = null) {

        return $this->curr_expense = $book['Book']['curr_expense'] + $debit_amount;
    }

}

?>
