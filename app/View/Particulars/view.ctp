<div class="row-fluid">   
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('Books'); ?>                </div>                                
            </div>
            <div class="widget-body">
                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <tr>
                        <th class="span3"><?php echo __('Id'); ?></th>
                        <td><?php echo h($particular['Book']['id']); ?>&nbsp;</td>
                        <th class="span3"><?php echo __('TARIKH'); ?></th>
                        <td><?php echo h($particular['Book']['date']); ?>&nbsp;</td>
                    </tr>
                    <tr>
                        <th class="span3"><?php echo __('VOT'); ?></th>
                        <td><?php echo h($particular['Book']['name']); ?>&nbsp;</td>
                        <th class="span3"><?php echo __('JUMLAH'); ?></th>                        
                        <td><?php echo h($this->Number->currency($particular['Book']['amount'], 'RM')); ?>&nbsp;</td>
                    </tr>
                    <tr>
                        <th class="span3"><?php echo __('PORGRAM/AKTIVITI'); ?></th>
                        <td><?php echo h($particular['Book']['prog_actv']); ?>&nbsp;</td>
                        <th class="span3"><?php echo __('BAKI MASIH ADA'); ?></th>                        
                        <td><?php echo h($this->Number->currency($particular['Book']['curr_balance'], 'RM')); ?>&nbsp;</td>
                    </tr>
                    <tr>
                        <th class="span3"><?php echo __('OBJEK SEBAGAI'); ?></th>
                        <td><?php echo h($particular['Book']['obj_as']); ?>&nbsp;</td>
                        <th class="span3"><?php echo __('PERBELANJAAN BERSIH'); ?></th>
                        <td><?php echo h($this->Number->currency($particular['Book']['curr_expense'], 'RM')); ?>&nbsp;</td>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span><?php echo __('View Particulars'); ?>                </div>                
                <div class="tools">
                    <div id='admin' class="btn-group">
                        <?php echo $this->Html->link(('Edit Particular'), array('action' => 'edit',$particular['Particular']['id']), array('class' => 'btn btn-info', 'data-placement' => 'top', 'data-original-title' => 'Edit Particular', 'escape' => FALSE)); ?>

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
                        <td><strong><?php echo __('Tarikh Rekod'); ?></strong></td>
                        <td>
                            <?php echo $this->Time->format('d-m-Y', $particular['Particular']['created']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Urus Setia'); ?></strong></td>
                        <td>
                            <?php echo h($particular['User']['name']); ?>
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
                        <td><strong><?php echo __('Jenis Rekod'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Type']['name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Latihan (Kursus / Bengkel / Persidangan / Seminar)'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['title']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Tarikh Latihan'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['date1']); ?>&nbsp;
                                <?php
                                if (!empty($particular['Particular']['date2'])) {
                                    echo h('hingga ' . $particular['Particular']['date2']);
                                }
                                ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Bayar Kepada (Penganjur/Pemohon)'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['payed']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Debit'); ?></strong></td>
                        <td>
                            <?php echo h($this->Number->currency($particular['Particular']['debit'], 'RM')); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Catatan'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['note']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Tarikh Terima Invois/Tuntutan'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['date3']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Tarikh Kepada Unit Kewangan'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['date4']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('No. Invoice/Ruj. Lain'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['invoice']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Perbelanjaan Bersih'); ?></strong></td>
                        <td>
                            <?php echo h($this->Number->currency($particular['Particular']['expense'], 'RM')); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Baki Masih Ada'); ?></strong></td>
                        <td>
                            <?php echo h($this->Number->currency($particular['Particular']['balance'], 'RM')); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('No. Ruj. Pembyaran'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Particular']['rujukan']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Status'); ?></strong></td>
                        <td>
                            <?php echo h($particular['Activity']['name']); ?>
                            &nbsp;
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>