<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14b;"></span><?php echo __('Add Particular'); ?>                </div>                
            </div>
            <div class="widget-body" id="particulars-form">
                <?php
                echo $this->Form->create('Particular', array('novalidate',
                    'class' => 'form-horizontal no-margin',
                    'inputDefaults' => array(
                        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                        'div' => array('class' => 'control-group'),
                        'label' => array('class' => 'control-label'),
                        'between' => '<div class="controls">',
                        'after' => '</div>', 'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')))));

                echo $this->Form->input('book_id');
                echo $this->Form->input('category_id', array(
                    'label' => array('class' => 'control-label', 'text' => 'Kategori Rekod'),
                    'placeholder' => 'book_id', 'empty' => 'Pilih Kategori Rekod',
                    'class' => 'span4'));

                echo '<div id="inputDebitTbs">';
                echo $this->Form->input('parent_id', array('options' => $parentparticulars,
                    'label' => array('class' => 'control-label', 'text' => 'Butiran Utama'),
                    'placeholder' => 'book_id', 'empty' => 'Pilih Butiran Utama',
                    'class' => 'span6'));
                echo '</div>';
                echo '<div id="inputBlank">';
                echo $this->Form->input('text', array(
                    'label' => array('class' => 'control-label', 'text' => 'Blank'),
                    'placeholder' => 'text',
                    'class' => 'span6'));
                echo '</div>';
                echo '<div id="inputTd">';
                echo $this->Form->input('name', array(
                    'label' => array('class' => 'control-label', 'text' => 'Nama'),
                    'placeholder' => 'name',
                    'class' => 'span6'));
//                echo $this->Form->input('dep', array(
//                    'label' => array('class' => 'control-label', 'text' => 'Jabatan/Fakulti'),
//                    'placeholder' => 'dep',
//                    'class' => 'span6'));
                echo $this->Form->input('desc', array(
                    'label' => array('class' => 'control-label', 'text' => 'Kursus/Bengkel/Persidangan/Seminar'),
                    'placeholder' => 'desc',
                    'class' => 'span6'));
//                echo $this->Form->input('date', array(
//                    'label' => array('class' => 'control-label', 'text' => 'Tarikh'),
//                    'between' => '<div class="controls"><div class="datepicker input-append" id="datepicker">',
//                    'data-format' => 'dd-MM-yyyy', 'class' => 'span6',
//                    'after' => '<span class="add-on"><i data-date-icon="icon-calendar"></i></span></div></div>',
//                ));
                #echo '<div class="control-group"><div class="controls text-error">TD di isi bagi Jenis Rekod Tanggungan</div></div>';
                echo $this->Form->input('row_td', array(
                    'label' => array('class' => 'control-label', 'text' => 'Tanggungan'),
                    'placeholder' => 'Tanggungan/dikenakan (dijelaskan)',
                    'class' => 'span4'));
                echo '</div>';

                echo '<div id="inputDebit">';
                echo $this->Form->input('date', array(
                    'label' => array('class' => 'control-label', 'text' => 'Tarikh'),
                    'between' => '<div class="controls"><div class="datepicker input-append" id="datepicker">',
                    'data-format' => 'dd-MM-yyyy', 'class' => 'span6',
                    'after' => '<span class="add-on"><i data-date-icon="icon-calendar"></i></span></div></div>',
                ));
                echo $this->Form->input('dep', array(
                    'label' => array('class' => 'control-label', 'text' => 'Jabatan/Fakulti'),
                    'placeholder' => 'dep',
                    'class' => 'span6'));
                echo $this->Form->input('sodo', array(
                    'label' => array('class' => 'control-label', 'text' => '+ Kod S.O.D.O'),
                    'placeholder' => 'sodo',
                    'class' => 'span6'));
                echo $this->Form->input('voucher', array(
                    'label' => array('class' => 'control-label', 'text' => 'No.Baucer/Ruj.Lain'),
                    'placeholder' => 'voucher',
                    'class' => 'span6'));
                #echo '<div class="control-group"><div class="controls text-error">Debit di isi bagi Jenis Rekod Bayaran</div></div>';                
                echo $this->Form->input('debit', array(
                    'label' => array('class' => 'control-label', 'text' => 'Debit'),
                    'placeholder' => 'debit',
                    'class' => 'span4'));
                echo '</div>';
                ?>
                <div id="inputBtn">
                    <div class="form-actions no-margin">
                        <?php echo $this->Form->button('Daftar', array('type' => 'submit', 'class' => 'btn btn-info')); ?>
                        <?php echo $this->Form->end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>