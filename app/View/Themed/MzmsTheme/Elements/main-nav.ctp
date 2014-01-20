<div class="hidden-phone hidden-tablet" id="main-nav">
    <ul>
        <li>
            <?php
            echo $this->Html->link(
                    '<span data-icon="&#xe000;" aria-hidden="true" class="fs1"></span> Laman Utama', '/', array(
                'escape' => false))
            ?>            
        </li>
        <li>
            <?php
            echo $this->Html->link(
                    '<span data-icon="&#xe020;" aria-hidden="true" class="fs1"></span>Buku Vot', array(
                'controller' => 'books', 'action' => 'index'), array(
                'escape' => false))
            ?>      
            <ul>
                <li>
                    <?php
                    echo $this->Html->link(
                            'Daftar Vot', array(
                        'controller' => 'books', 'action' => 'add'), array(
                        'escape' => false))
                    ?>      
                </li>
            </ul>
        </li>        
        <li id="admin">
            <?php
            echo $this->Html->link(
                    '<span data-icon="&#xe08e;" aria-hidden="true" class="fs1"></span>Administrator', array('#'), array(
                'escape' => false))
            ?>      
            <ul>
                <li>
                    <?php
                    echo $this->Html->link(
                            '<span data-icon="&#xe071;" aria-hidden="true" class="fs1"></span>Kumpulan', '/admin/groups', array(
                        'escape' => false))
                    ?>
                </li>
                <li>
                    <?php
                    echo $this->Html->link(
                            '<span data-icon="&#xe070;" aria-hidden="true" class="fs1"></span>Pengguna', '/admin/users', array(
                        'escape' => false))
                    ?>
                </li>
            </ul>
        </li>

    </ul>
    <div class="clearfix"></div>
</div>