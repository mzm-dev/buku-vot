<div class="row-fluid">   
    <div class="span12">
        <ul class="breadcrumb-beauty">
            <li><?php echo $this->Html->link('User', array('action' => 'index')); ?></li>        
            <li><a data-original-title="" href="#">View User</a></li>
        </ul>
        <div class="clearfix">&nbsp;</div>
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('User'); ?>                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(('Add New Category'), array('action' => 'add'), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Add New Category', 'escape' => FALSE)); ?>

                    </div>
                </div>
            </div>
            <div class="widget-body">                
                <table class="condensed-table">
                    <tbody>
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <td><?php echo h($user['User']['id']); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo __('Email'); ?></th>
                            <td><?php echo h($user['User']['email']); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo __('Group'); ?></th>
                            <td><?php echo h($user['Group']['name']); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo __('Created'); ?></th>
                            <td><?php echo h($user['User']['created']); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo __('Modified'); ?></th>
                            <td><?php echo h($user['User']['modified']); ?></td>
                        </tr>
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
</div>s
