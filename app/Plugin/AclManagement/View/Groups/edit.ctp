<div class="row-fluid">   
    <div class="span12">
<!--        <ul class="breadcrumb-beauty">
            <li><?php #echo $this->Html->link('Group', array('action' => 'index')); ?></li>        
            <li><a data-original-title="" href="#">Edit Group</a></li>
        </ul>
        <div class="clearfix">&nbsp;</div>-->
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Edit Group'); ?>                </div>                
            </div>
            <div class="widget-body" id="categories-form">                
                <?php
                echo $this->Form->create('Group', array('novalidate',
                    'class' => 'form-horizontal no-margin',
                    'inputDefaults' => array(
                        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                        'div' => array('class' => 'control-group'),
                        'label' => array('class' => 'control-label'),
                        'between' => '<div class="controls">',
                        'after' => '</div>', 'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')))));
                echo $this->Form->input('id');
                echo $this->Form->input('name', array(
                    'label' => array('class' => 'control-label', 'text' => 'Name'),
                    'placeholder' => 'name',
                    'class' => 'span6'));                
                ?>
                <div class="form-actions no-margin">                    
                    <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-info', 'div' => false)); ?>
                    <?php echo $this->Form->reset(__('Cancel'), array('class' => 'btn', 'div' => false)); ?>                   
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
