<div class="modal hide fade" id="dialog-add-type">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">x</button>
        <h3>Daftar Jenis Baru</h3>
    </div>

    <?php echo $this->Form->create('Type', array('action' => 'ajax_add')); ?>
    <div class="modal-body">

        <?php
        echo $this->Form->input('name', array('label'=>'Jenis'));        
        ?>

    </div>
    <div class="modal-footer">
        <a data-dismiss="modal" class="btn" href="#">Keluar</a>
        <a class="btn btn-primary" href="#">Simpan</a>
    </div>
    <?php #echo $this->Form->submit('Save Type', array('class'=>'btn btn-primary"')); ?>
    <?php echo $this->Form->end(); ?>
</div>
