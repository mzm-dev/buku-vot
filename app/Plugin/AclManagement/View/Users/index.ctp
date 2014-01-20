<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14b;"></span><?php echo __('User'); ?>                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(('Add New User'), array('action' => 'add'), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Add New Category', 'escape' => FALSE)); ?>
                    </div>
                </div>
            </div>
            <div class="widget-body">
                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <tr>
                        <th class="header"><?php echo $this->Paginator->sort('id'); ?></th>
                        <th class="header"><?php echo $this->Paginator->sort('Name'); ?></th>
                        <th class="header"><?php echo $this->Paginator->sort('Username'); ?></th>
                        <th class="header"><?php echo $this->Paginator->sort('email'); ?></th>
                        <th class="header"><?php echo $this->Paginator->sort('group_id'); ?></th>
                        <th class="header"><?php echo $this->Paginator->sort('created'); ?></th>
                        <th class="header"><?php echo $this->Paginator->sort('status'); ?></th>                        
                        <th class="header center"><?php echo __('Actions'); ?></th>
                    </tr>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                            <td><?php echo h($user['Group']['name']); ?>&nbsp;</td>
                            <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                            <td>
                                <?php
                                $adminRoleName = array('admin', 'administrator');
                                if (in_array(strtolower($user['Group']['name']), $adminRoleName)) {//Admin
                                    echo $this->Html->image('/acl_management/img/icons/tick_disabled.png');
                                } else {
                                    echo '<span style="cursor: pointer">';
                                    echo $this->Html->image('/acl_management/img/icons/allow-' . intval($user['User']['status']) . '.png', array('onclick' => 'published.toggle("status-' . $user['User']['id'] . '", "' . $this->Html->url('/acl_management/users/toggle/') . $user['User']['id'] . '/' . intval($user['User']['status']) . '");',
                                        'id' => 'status-' . $user['User']['id']
                                    ));
                                    echo '</span>&nbsp;';
                                }
                                ?>
                            </td>                            
                            <td class="center">
                                <?php echo $this->Html->link(('<span data-icon="&#xe07f" aria-hidden="true" class="fs1"></span>'), array('action' => 'view', $user['User']['id']), array('data-placement' => 'top', 'data-original-title' => 'View', 'escape' => FALSE)); ?>
                                <?php echo $this->Html->link(('<span data-icon="&#xe005" aria-hidden="true" class="fs1"></span>'), array('action' => 'edit', $user['User']['id']), array('data-placement' => 'top', 'data-original-title' => 'Edit', 'escape' => FALSE)); ?>                                
                                <?php echo $this->Form->postLink(__('<span data-icon="&#xe0a8" aria-hidden="true" class="fs1"></span>'), array('action' => 'delete', $user['User']['id']), array('data-placement' => 'top', 'data-original-title' => 'Delete', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>                    
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <p><small>
                        <?php
                        echo $this->Paginator->counter(array(
                            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                        ));
                        ?>                    </small></p>

                <div class="pagination">
                    <ul>
                        <?php
                        echo ($this->Paginator->current() > 3) ? $this->Paginator->first('first ', array('tag' => 'li')) : '';
                        echo ($this->Paginator->hasPrev()) ? $this->Paginator->prev(__('prev ', true), array('tag' => 'li', 'id' => 'prev' . rand(2, 9000)), null, array('escape' => false)) : '';
                        echo $this->Paginator->numbers(array('modulus' => 7, 'separator' => ' ', 'tag' => 'li'));
                        echo ($this->Paginator->hasNext()) ? $this->Paginator->next(__(' next', true), array('tag' => 'li'), null, array('escape' => false)) : '';
                        echo ((int) $this->Paginator->counter(array('format' => '%pages%')) > 10) ? $this->Paginator->last('last', array('tag' => 'li')) : '';
                        echo $this->Js->writeBuffer();
                        ?>
                    </ul>
                </div><!-- .pagination -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var published = {
        toggle : function(id, url){
            obj = $('#'+id).parent();
            $.ajax({
                url: url,
                type: "POST",
                success: function(response){
                    obj.html(response);
                }
            });
        }
    };
</script>