<style>
    th.ct-table{
        text-align: center;        
    }
    td.rt-table{
        text-align: right;
    }
    tr.tbs{
        color: red;
    }
    span.mini{
        font-size: 100%;
    }

</style>

<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Books'); ?>                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(('Edit Book'), array('action' => 'edit', $book['Book']['id']), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Edit Book', 'escape' => FALSE)); ?>
                    </div>
                    <div class="btn-group btn-success">
                        <button class="btn btn-success">Laporan</button>
                        <button class="btn dropdown-toggle btn-success" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <?php 
                            foreach ($activities as $activity):
                                echo "<li>";
                            #echo $this->Html->link($activity['Activity']['name'], '#', array('onclick'=>"var openWin = window.open('".$html->url(array('action' => 'preview',$book['Book']['id'], $activity['Activity']['id'])."', '_blank', 'toolbar=0,scrollbars=1,location=0,status=1,menubar=0,resizable=1,width=500,height=500');  return false;"))); 
                                echo $this->Html->link(($activity['Activity']['name']), array('action' => 'preview',$book['Book']['id'], $activity['Activity']['id']), array('target' => '_blank','id'=>'report','escape' => FALSE));
                                echo "</li>";
                            endforeach;
                            ?>                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="widget-body">
                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <tr>
                        <th class="span3"><?php echo __('Id'); ?></th>
                        <td><?php echo h($book['Book']['id']); ?>&nbsp;</td>
                        <th class="span3"><?php echo __('TARIKH'); ?></th>
                        <td><?php echo h($book['Book']['date']); ?>&nbsp;</td>
                    </tr>
                    <tr>
                        <th class="span3"><?php echo __('VOT'); ?></th>
                        <td><?php echo h($book['Book']['name']); ?>&nbsp;</td>
                        <th class="span3"><?php echo __('JUMLAH'); ?></th>                        
                        <td><?php echo h($this->Number->currency($book['Book']['amount'], 'RM')); ?>&nbsp;</td>
                    </tr>
                    <tr>
                        <th class="span3"><?php echo __('PORGRAM/AKTIVITI'); ?></th>
                        <td><?php echo h($book['Book']['prog_actv']); ?>&nbsp;</td>
                        <th class="span3"><?php echo __('BAKI MASIH ADA'); ?></th>                        
                        <td><?php echo h($this->Number->currency($book['Book']['curr_balance'], 'RM')); ?>&nbsp;</td>
                    </tr>
                    <tr>
                        <th class="span3"><?php echo __('OBJEK SEBAGAI'); ?></th>
                        <td><?php echo h($book['Book']['obj_as']); ?>&nbsp;</td>
                        <th class="span3"><?php echo __('PERBELANJAAN BERSIH'); ?></th>
                        <td><?php echo h($this->Number->currency($book['Book']['curr_expense'], 'RM')); ?>&nbsp;</td>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Related '); ?>                
                </div> 
                <div class="tools">
                    <div class="btn-group">
                        <?php echo $this->Html->link(('Add New Particular'), array('controller' => 'particulars', 'action' => 'add', $book['Book']['id']), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Add New Particular', 'escape' => FALSE)); ?>
                    </div>
                </div>
            </div>

            
                <table id="userStyle" class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <tr>                                               

                        <th class="span1 ct-table"><?php echo __('Tarikh Rekod'); ?></th>
                        <th><?php echo __('Urus Setia'); ?></th>                        
                        <th><?php echo __('Nama'); ?></th>      
                        <th><?php echo __('Jenis'); ?></th>
                        <th><?php echo __('Latihan'); ?></th>
                        <th class="span1"><?php echo __('Tarikh Latihan'); ?></th>                                                
                        <th><?php echo __('BAYARAN KEPADA (PENGAJUR/PEMOHON)'); ?></th>                                                
                        <th class="span1 ct-table"><?php echo __('Debit'); ?></th>                    
                        <th id="admin" class="span1 ct-table"><?php echo __('Kredit'); ?></th>                        
                        <th id="admin" class="span2"><?php echo __('Tarikh Terima Invois/Tuntutan'); ?></th>  
                        <th id="admin" class="span2"><?php echo __('Tarikh Kepada Unit Kew'); ?></th>  
                        <th id="admin" class="span2"><?php echo __('No. Invoice/Ruj. Lain'); ?></th>  
                        <th id="admin" class="span1 ct-table"><?php echo __('Perbelanjaan Bersih'); ?></th>                 
                        <th id="admin" class="span1 ct-table"><?php echo __('Baki Masih Ada'); ?></th>                                        
                        <th id="admin" class="span2"><?php echo __('No. Ruj. Pembyaran'); ?></th>  
                        <th id="admin" class="span2"><?php echo __('Status'); ?></th> 
                        <th class="span1 ct-table"><?php echo __('#'); ?></th>                    
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
                            <td><?php echo $this->Time->format('d-m-Y', $particular['Particular']['created']); ?>&nbsp;</td>
                            <td><?php echo h($particular['User']['name']); ?>&nbsp;</td>                            
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
                            <td id="admin" class="rt-table" ><?php echo h($this->Number->currency($particular['Particular']['credit'], 'RM')); ?>&nbsp;</td>                            
                            <td id="admin"><?php echo h($particular['Particular']['date3']); ?>&nbsp;</td>
                            <td id="admin"><?php echo h($particular['Particular']['date3']); ?>&nbsp;</td>
                            <td id="admin"><?php echo h($particular['Particular']['invoice']); ?>&nbsp;</td>                            
                            <td id="admin" class="rt-table" ><?php echo h($this->Number->currency($particular['Particular']['expense'], 'RM')); ?>&nbsp;</td>                            
                            <td id="admin" class="rt-table" ><?php echo h($this->Number->currency($particular['Particular']['balance'], 'RM')); ?>&nbsp;</td>                            
                            <td id="admin"><?php echo h($particular['Particular']['rujukan']); ?>&nbsp;</td>
                            <td id="admin"><?php echo h($particular['Activity']['name']); ?>&nbsp;</td>
                            <td><?php echo $this->Html->link(('<span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span>'), array('controller' => 'particulars', 'action' => 'edit', $particular['Particular']['id']), array('data-placement' => 'top', 'data-original-title' => 'Edit', 'escape' => FALSE)); ?></td>                        
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php if(empty($particulars)):
            echo '<div class="alert alert-block alert-error fade in"><p>Data Empty</p></div>';
        endif; ?>
        </div>
    </div>
</div>
