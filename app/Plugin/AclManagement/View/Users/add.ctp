<div class="row-fluid">   
    <div class="span12">
<!--        <ul class="breadcrumb-beauty">
            <li><?php #echo $this->Html->link('User', array('action' => 'index')); ?></li>        
            <li><a data-original-title="" href="#">New User</a></li>
        </ul>
        <div class="clearfix">&nbsp;</div>-->
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Add New User'); ?>                </div>                
            </div>
            <div class="widget-body" id="categories-form">                
                <?php
                echo $this->Form->create('User', array('novalidate',
                    'class' => 'form-horizontal no-margin',
                    'inputDefaults' => array(
                        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                        'div' => array('class' => 'control-group'),
                        'label' => array('class' => 'control-label'),
                        'between' => '<div class="controls">',
                        'after' => '</div>', 'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')))));

                echo $this->Form->input('name', array(
                    'label' => array('class' => 'control-label', 'text' => 'Name'),
                    'placeholder' => 'name',
                    'class' => 'span6'));
                echo $this->Form->input('username', array(
                    'label' => array('class' => 'control-label', 'text' => 'Username'),
                    'placeholder' => 'username',
                    'class' => 'span6'));
                echo $this->Form->input('email', array(
                    'label' => array('class' => 'control-label', 'text' => 'Email'),
                    'placeholder' => 'email',
                    'class' => 'span6'));
                echo $this->Form->input('password', array(
                    'label' => array('class' => 'control-label', 'text' => 'Password'),
                    'placeholder' => 'password',
                    'class' => 'span6'));
                echo $this->Form->input('password2', array(
                    'label' => array('class' => 'control-label', 'text' => 'Confirm Password'),
                    'placeholder' => 'password',
                    'class' => 'span6','type'=>'password'));
                echo $this->Form->input('group_id', array(
                    'label' => array('class' => 'control-label', 'text' => 'Group'),
                    'empty' => 'Select Group',
                    'class' => 'span6'));
                echo $this->Form->input('status', array(
                    'label' => array('class' => 'control-label', 'text' => 'Status')));
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
