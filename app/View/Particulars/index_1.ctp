<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Particulars'); ?>                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(('Add New Particular'), array('action' => 'add'), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Add New Particular', 'escape' => FALSE)); ?>
                        
                    </div>
                </div>
            </div>
            <div class="widget-body">
                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <tr>
                                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('book_id'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('dep'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('desc'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('date'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('text'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('sodo'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('voucher'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('debit'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('credit'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('balance'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                                                    <th><?php echo $this->Paginator->sort('s'); ?></th>
                                                <th class="span2"><?php echo __('Actions'); ?></th>
                    </tr>
                    <?php foreach ($particulars as $particular): ?>
	<tr>
		<td><?php echo h($particular['Particular']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($particular['Book']['name'], array('controller' => 'books', 'action' => 'view', $particular['Book']['id'])); ?>
		</td>
		<td><?php echo h($particular['Particular']['name']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['dep']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['desc']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['date']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['text']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['sodo']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['voucher']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['debit']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['credit']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['balance']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['created']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['modified']); ?>&nbsp;</td>
		<td><?php echo h($particular['Particular']['s']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $particular['Particular']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $particular['Particular']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $particular['Particular']['id']),null, __('Are you sure you want to delete # %s?', $particular['Particular']['id'])); ?>
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
		echo $this->Js->writeBuffer(); ?>
                    </ul>
                </div><!-- .pagination -->
            </div>
        </div>
    </div>
</div>