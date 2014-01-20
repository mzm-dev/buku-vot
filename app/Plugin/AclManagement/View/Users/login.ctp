<div class="row-fluid">
    <div class="span4 offset4">
        <div class="signin">
            <div class="box">
                <p style="text-align: center"><img alt="" src="../img/jata_negara.png"><img alt="" src="../img/logo_jln.png"></p>                
                <h2 class="text-warning center-align-text "><?php echo Configure::read('Sys.Name'); ?></h2>
            </div>

            <?php echo $this->Form->create('User', array('action' => 'login', 'novalidate', 'class' => 'signin-wrapper')); ?>

            <div class="content">
                <?php echo $this->Session->flash(); ?>
                <?php
                echo $this->Form->input('username', array('placeholder' => 'id penguna', 'div' => 'clearfix', 'class' => 'input input-block-level', 'label' => false));
                echo $this->Form->input('password', array('placeholder' => 'katalaluan', 'div' => 'clearfix', 'class' => 'input input-block-level', 'label' => false));
                ?>
            </div>
            <div class="actions">
                <?php echo $this->Form->submit(__('Login'), array('class' => 'btn btn-info pull-right', 'div' => false)); ?>                        
                
                <div class="clearfix"></div>
            </div>
            <?php echo $this->Form->end(); ?>
            <p style="color:#FFFFFF" class="center-align-text">&copy; Copyright 2014<br/>Sistem Pengurusan VOT</p>
        </div>

    </div>    
</div>