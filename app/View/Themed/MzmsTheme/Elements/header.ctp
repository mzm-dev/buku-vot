<header>
    <a href="index.html" class="logo">Penyelenggaraan Vot</a>
    <div id="mini-nav">
        <ul class="hidden-phone">  

            <?php if ($this->Session->read('Auth.User')): ?>
                <li>
                    <?php
                    echo $this->Html->link(
                            $this->Session->read('Auth.User.name'), array(
                        'controller' => 'users', 'action' => 'profile', $this->Session->read('Auth.User.id')), array(
                        'escape' => false))
                    ?> 
                </li>

                <li>
                    <?php
                    echo $this->Html->link(
                            '<span data-icon="&#xe104;" aria-hidden="true" class="fs1"></span>', array(
                        'controller' => 'users', 'action' => 'logout'), array(
                        'escape' => false))
                    ?> 
                </li>
            <?php else: ?>
                <li>
                    <?php
                    echo $this->Html->link(
                            '<span data-icon="&#xe0b1;" aria-hidden="true" class="fs1"></span>', array(
                        'controller' => 'users', 'action' => 'login'), array(
                        'escape' => false))
                    ?> 
                </li>
            <?php endif; ?>
        </ul>
        <div class="clearfix"></div>
    </div>
</header>