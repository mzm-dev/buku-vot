<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Particulars'); ?>                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(('Edit Particular'), array('action' => 'edit'), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Edit Particular', 'escape' => FALSE)); ?>

                    </div>
                </div>
            </div>
            <div class="widget-body">
                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <tr>
                        <td><strong><?php echo __('Id'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['id']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Book'); ?></strong></td>
                        <td>
                            <?php echo $this->Html->link($particular['Book']['name'], array('controller' => 'books', 'action' => 'view', $particular['Book']['id']), array('class' => '')); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Name'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Dep'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['dep']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Desc'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['desc']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Date'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['date']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Text'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['text']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Sodo'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['sodo']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Voucher'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['voucher']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Debit'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['debit']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Credit'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['credit']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Balance'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['balance']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Created'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['created']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Modified'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['modified']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('S'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['s']); ?>
                            &nbsp;
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>
<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Related Books'); ?>                </div>                                
            </div>
            <div class="widget-body">
            </div>
        </div>
    </div>
</div>