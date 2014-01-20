<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14b;"></span><?php echo __('Books'); ?>                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(('Add New Book'), array('action' => 'add'), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Add New Book', 'escape' => FALSE)); ?>

                    </div>
                </div>
            </div>
            <div class="widget-body">
                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <tr>
                        <th><?php echo $this->Paginator->sort('ID'); ?></th>
                        <th><?php echo $this->Paginator->sort('VOT'); ?></th>
                        <th><?php echo $this->Paginator->sort('PROG/AKT'); ?></th>
                        <th><?php echo $this->Paginator->sort('OBJ SEBAGAI'); ?></th>
                        <th><?php echo $this->Paginator->sort('TARIKH'); ?></th>
                        <th><?php echo $this->Paginator->sort('PERUNTUKAN'); ?></th>
                        <th><?php echo $this->Paginator->sort('BAKI MASIH ADA'); ?></th> 
                        <th><?php echo $this->Paginator->sort('PERBELANJAAN BERSIH'); ?></th>                                                                       
                        <th class="span2"><?php echo __('#'); ?></th>
                    </tr>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?php echo h($book['Book']['id']); ?>&nbsp;</td>
                            <td><?php echo h($book['Book']['name']); ?>&nbsp;</td>
                            <td><?php echo h($book['Book']['prog_actv']); ?>&nbsp;</td>
                            <td><?php echo h($book['Book']['obj_as']); ?>&nbsp;</td>
                            <td><?php echo h($book['Book']['date']); ?>&nbsp;</td>
                            <td><?php echo h($this->Number->currency($book['Book']['amount'], 'RM')); ?>&nbsp;</td>                            
                            <td><?php echo h($this->Number->currency($book['Book']['curr_balance'], 'RM')); ?>&nbsp;</td>                            
                            <td><?php echo h($this->Number->currency($book['Book']['curr_expense'], 'RM')); ?>&nbsp;</td>                                                                                  
                            <td class="actions">
                                <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span>'), array('action' => 'view', $book['Book']['id']), array('data-placement' => 'top', 'data-original-title' => 'View', 'escape' => FALSE)); ?>
                                <?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span>'), array('action' => 'edit', $book['Book']['id']), array('data-placement' => 'top', 'data-original-title' => 'Edit', 'escape' => FALSE)); ?>                                
                                <?php echo $this->Form->postLink(__('<span class="fs1" aria-hidden="true" data-icon="&#xe0a8;"></span>'), array('action' => 'delete', $book['Book']['id']), array('data-placement' => 'top', 'data-original-title' => 'Delete', 'escape' => FALSE), __('Are you sure you want to delete # %s?', $book['Book']['id'])); ?>                               
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
                        echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li'));
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