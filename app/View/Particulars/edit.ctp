<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14b;"></span><?php echo __('Edit Particular'); ?>                </div>                
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

                echo $this->Form->input('id');
                echo $this->Form->input('book_id');
                echo $this->Form->input('name', array(
                    'label' => array('class' => 'control-label', 'text' => 'Nama'),
                    'placeholder' => 'name',
                    'class' => 'span6'));
                echo $this->Form->input('type_id', array(
                    'label' => array('class' => 'control-label', 'text' => 'Jenis Rekod'),
                    'placeholder' => 'type_id', 'empty' => 'Pilih Jenis Rekod',
                    'class' => 'span4'));

                echo $this->Form->input('title', array(
                    'label' => array('class' => 'control-label', 'text' => 'Latihan'),
                    'placeholder' => 'text', 'after' => '<div class="control-group"><div class="text-info">Latihan (Kursus / Bengkel / Persidangan / Seminar)</div></div>',
                    'class' => 'span6', 'rows' => 2));

                echo $this->Form->input('date1', array(
                    'label' => array('class' => 'control-label', 'text' => 'Tarikh Mula'),
                    'between' => '<div class="controls"><div class="datepicker input-append" id="datepicker">',
                    'data-format' => 'dd-MM-yyyy', 'class' => 'span8',
                    'after' => '<span class="add-on"><i data-date-icon="icon-calendar"></i></span></div></div>',
                ));
                echo $this->Form->input('date2', array(
                    'label' => array('class' => 'control-label', 'text' => 'Tarikh Tamat'),
                    'between' => '<div class="controls"><div class="datepicker input-append" id="datepicker">',
                    'data-format' => 'dd-MM-yyyy', 'class' => 'span8',
                    'after' => '<span class="add-on"><i data-date-icon="icon-calendar"></i></span></div></div>',
                ));
                echo $this->Form->input('payed', array(
                    'label' => array('class' => 'control-label', 'text' => 'Bayaran Kepada'),
                    'placeholder' => 'text', 'after' => '<div class="control-group"><div class="text-info">BAYARAN KEPADA (PENGAJUR/PEMOHON)</div></div>',
                    'class' => 'span6', 'rows' => 2));

                echo $this->Form->input('debit', array(
                    'label' => array('class' => 'control-label','text' => 'Debit'),
                    'between' => '<div class="controls"><div class="input-append"> <span class="add-on">RM</span>',
                    'after' => '</div></div>',
                    'class' => 'span8',
                ));
                //echo "<div id='admin'>";                
                echo $this->Form->input('credit', array(
                    'label' => array('class' => 'control-label','text' => 'Kredit'),
                    'between' => '<div class="controls"><div class="input-append"> <span class="add-on">RM</span>',
                    'after' => '</div></div>',
                    'class' => 'span8',
                ));
                echo $this->Form->input('date3', array(
                    'label' => array('class' => 'control-label', 'text' => 'Tarikh Terima Invois/Tuntutan'),
                    'between' => '<div class="controls"><div class="datepicker input-append" id="datepicker">',
                    'data-format' => 'dd-MM-yyyy', 'class' => 'span8',
                    'after' => '<span class="add-on"><i data-date-icon="icon-calendar"></i></span></div></div>',
                ));
                echo $this->Form->input('date4', array(
                    'label' => array('class' => 'control-label', 'text' => 'Tarikh Kepada Unit Kew'),
                    'between' => '<div class="controls"><div class="datepicker input-append" id="datepicker">',
                    'data-format' => 'dd-MM-yyyy', 'class' => 'span8',
                    'after' => '<span class="add-on"><i data-date-icon="icon-calendar"></i></span></div></div>',
                ));
                echo $this->Form->input('invoice', array(
                    'label' => array('class' => 'control-label', 'text' => 'No. Invoice/Ruj. Lain'),
                    'placeholder' => 'credit',
                    'class' => 'span6'));
                echo $this->Form->input('activity_id', array(
                    'label' => array('class' => 'control-label', 'text' => 'Status'),
                    'placeholder' => 'credit', 'class' => 'span4'));
                //echo "</div>";
                ?>

                <div class="form-actions no-margin">
                    <?php echo $this->Form->button('Kemaskini', array('type' => 'submit', 'class' => 'btn btn-info')); ?>
                    <?php echo $this->Form->end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>