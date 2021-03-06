<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
#$cakeDescription = __d('cake_dev', Configure::read('Prj.name'));
?>
<?php echo $this->Html->docType('html5'); ?> 
<html>
    <head>
        <?php #echo $this->Html->charset(); ?>
        <title>
            <?php #echo $cakeDescription  ?>:
            <?php #echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->fetch('meta');

        echo $this->Html->css('main');
        echo $this->Html->css('listnav');
        echo $this->Html->css('select2');        
        echo $this->Html->css('bootstrap-datetimepicker.min');        
        echo $this->Html->css('style');        


        echo $this->fetch('css');
        echo $this->Html->script('jquery.min');
        echo $this->fetch('script');
        ?>

        <script type="text/javascript">            
            var sid='<?php echo $this->Session->read('Auth.User.group_id'); ?>';     
        </script>

    </head>
    <body>
        
        <div class="container-fluid">
            <div class="dashboard-wrapper">                
                <div class="main-container">                                        
                    <div  id="content">
                        <?php echo $this->Session->flash(); ?>                   
                        <?php echo $this->fetch('content'); ?>
                    </div>                    
                    
                </div>

            </div>
        </div>   
        <?php
        echo $this->Html->script('bootstrap');
        echo $this->Html->script('html5-trunk');                
        echo $this->Html->script('tiny-scrollbar');
        echo $this->Html->script('listnav');
        echo $this->Html->script('select2.min');
        echo $this->Html->script('bootstrap-datetimepicker');
        echo $this->Html->script('custom');
        echo $this->fetch('script');
        ?>
    </body>

</html>