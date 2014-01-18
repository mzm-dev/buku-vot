<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Related '); ?>                
                </div> 
                <div class="tools">
                    <div class="btn-group">

                        <?php echo $this->Html->link(('Add New Particular'), array('controller' => 'particulars', 'action' => 'add', $book['Book']['id']), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Add New Particular', 'escape' => FALSE)); ?>
                    </div>
                </div>
            </div>

            <div class="widget-body">
                <table style="font-size: 8px" class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <tr>                                               
                        <th class="span1 ct-table"><?php echo __('#'); ?></th>
                        <th class="span1 ct-table"><?php echo __('Tarikh Rekod'); ?></th>
                        <th><?php echo __('Urus Setia'); ?></th>                        
                        <th><?php echo __('Nama'); ?></th>      
                        <th><?php echo __('Jenis'); ?></th>
                        <th><?php echo __('Latihan'); ?></th>
                        <th class="span1"><?php echo __('Tarikh Latihan'); ?></th>                                                
                        <th><?php echo __('BAYARAN KEPADA (PENGAJUR/PEMOHON)'); ?></th>                                                
                        <th class="span1 ct-table"><?php echo __('Debit'); ?></th>                        
                        <th class="span1 ct-table"><?php echo __('Kredit'); ?></th>                        
                        <th class="span2"><?php echo __('Tarikh Terima Invois/Tuntutan'); ?></th>  
                        <th class="span2"><?php echo __('Tarikh Kepada Unit Kew'); ?></th>  
                        <th class="span2"><?php echo __('No. Invoice/Ruj. Lain'); ?></th>  
                        <th class="span1 ct-table"><?php echo __('Perbelanjaan Bersih'); ?></th>                 
                        <th class="span1 ct-table"><?php echo __('Baki Masih Ada'); ?></th>                                        
                        <th class="span2"><?php echo __('No. Ruj. Pembyaran'); ?></th>  
                        <th class="span2"><?php echo __('Status'); ?></th>  
                    </tr>
                    <?php
                    foreach ($particulars as $particular):
                        $class = null;
                        $parent = null;
                        if (!empty($particular['Particular']['parent_id'])) {
                            $class = ' class="tbs"';
                            $parent = '<span class="mini">[' . $particular['Particular']['parent_id'] . ']</span>';
                        }
                        ?>

                        <tr <?php echo $class; ?>>
                            
                            <td><?php echo $this->Html->link(__('EDIT'), array('controller'=>'particulars','action' => 'edit', $particular['Particular']['id'])); ?>&nbsp;</td>
                            <td><?php echo $this->Html->link(__($this->Time->format('d-m-Y', $particular['Particular']['created'])), array('controller'=>'particulars','action' => 'edit', $particular['Particular']['id'])); ?>&nbsp;</td>
                            <td><?php echo h($particular['User']['name1']); ?>&nbsp;</td>                            
                            <td><?php echo h($particular['Particular']['name']); ?>&nbsp;</td>                            
                            <td><?php echo h($particular['Type']['name']); ?>&nbsp;</td>
                            <td><?php echo h($particular['Particular']['title']); ?>&nbsp;</td>                             
                            <td><?php echo h($particular['Particular']['date1']); ?>&nbsp;
                                <?php
                                if (!empty($particular['Particular']['date2'])) {
                                    echo h('hingga ' . $particular['Particular']['date2']);
                                }
                                ?>
                            </td>                                                        
                            <td><?php echo h($particular['Particular']['payed']); ?>&nbsp;
                            <td class="rt-table" ><?php echo h($this->Number->currency($particular['Particular']['debit'], 'RM')); ?>&nbsp;</td>
                            <td class="rt-table" ><?php echo h($this->Number->currency($particular['Particular']['credit'], 'RM')); ?>&nbsp;</td>                            
                            <td><?php echo h($particular['Particular']['date3']); ?>&nbsp;</td>
                            <td><?php echo h($particular['Particular']['date3']); ?>&nbsp;</td>
                            <td><?php echo h($particular['Particular']['invoice']); ?>&nbsp;</td>                            
                            <td class="rt-table" ><?php echo h($this->Number->currency($particular['Particular']['expense'], 'RM')); ?>&nbsp;</td>                            
                            <td class="rt-table" ><?php echo h($this->Number->currency($particular['Particular']['balance'], 'RM')); ?>&nbsp;</td>                            
                            <td><?php echo h($particular['Particular']['rujukan']); ?>&nbsp;</td>
                            <td><?php 
                            if(!empty($particular['Particular']['status']))
                            echo h('Selesai'); ?>&nbsp;</td>
                        </tr>
<?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>