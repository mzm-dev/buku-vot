<?php echo $this->Html->css(array('/acl_management/css/treeview')); ?>
<?php
echo $this->Html->script(array(
    '/acl_management/js/jquery.cookie',
    '/acl_management/js/treeview',
    '/acl_management/js/acos',
    '/acl_management/js/twitter/bootstrap-buttons',
));
?>
<div class="row-fluid">   
    <div class="span6">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe0b9;"></span><?php echo __('Acos'); ?>
                </div>                
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-loading-text="loading..." >Generate</button>
                    </div>
                </div>
            </div>
                            
                <div id="acos">
                    <?php echo $this->Tree->generate($results, array('alias' => 'alias', 'plugin' => 'acl_management', 'model' => 'Aco', 'id' => 'acos-ul', 'element' => '/permission-node')); ?>
                </div>
            
        </div>           
    </div>           
    <div class="span6">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe0b3;"></span><?php echo __('Aros'); ?>
                </div>                
            </div>
            <div class="widget-body">
                <div id="aco-edit"></div>
            </div>           
        </div>           
    </div>           
</div>           

<script type="text/javascript">
    $(document).ready(function() { 
        $("#acos").treeview({collapsed: true});
    });
    $(function() {
        var btn = $('.btn').click(function () {
            btn.button('loading');
            $.get('<?php echo $this->Html->url('/acl_management/user_permissions/sync'); ?>', {},
            function(data){
                btn.button('reset');
                $("#acos").html(data);
            }
        );        
        })
    });
</script>
