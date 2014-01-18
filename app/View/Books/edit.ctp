<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14b;"></span><?php echo __('Edit Book'); ?>                </div>                
            </div>
            <div class="widget-body" id="books-form">
                <?php
                echo $this->Form->create('Book', array('novalidate',
                    'class' => 'form-horizontal no-margin',
                    'inputDefaults' => array(
                        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                        'div' => array('class' => 'control-group'),
                        'label' => array('class' => 'control-label'),
                        'between' => '<div class="controls">',
                        'after' => '</div>', 'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')))));

                echo $this->Form->input('id');
                echo $this->Form->input('name', array(
                    'label' => array('class' => 'control-label', 'text' => 'VOT'),
                    'placeholder' => 'CTH : B26', 'class' => 'span4'));
                echo $this->Form->input('prog_actv', array(
                    'label' => array('class' => 'control-label', 'text' => 'PROG/AKT'),
                    'placeholder' => 'CTH : 020424', 'class' => 'span4'));
                echo $this->Form->input('obj_as', array(
                    'label' => array('class' => 'control-label', 'text' => 'OBJEK SEBAGAI'),
                    'placeholder' => 'CTH : OS26000', 'class' => 'span4'));
                echo $this->Form->input('date', array(
                    'label' => array('class' => 'control-label', 'text' => 'TARIKH'),
                    'between' => '<div class="controls"><div class="datepicker input-append" id="datepicker">',
                    'data-format' => 'dd-MM-yyyy', 'class' => 'span6',
                    'after' => '<span class="add-on"><i data-date-icon="icon-calendar"></i></span></div></div>',
                ));
                echo $this->Form->input('amount', array(
                    'label' => array('class' => 'control-label', 'text' => 'JUMLAH'),
                    'placeholder' => 'CTH : 1000000.00', 'class' => 'span2'));
                ?>
                <div class="form-actions no-margin">
                    <?php echo $this->Form->button('Daftar', array('type' => 'submit', 'class' => 'btn btn-info')); ?>
                    <?php echo $this->Form->end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>