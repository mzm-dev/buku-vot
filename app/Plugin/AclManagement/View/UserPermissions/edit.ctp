<ul class="breadcrumb-beauty">
    <?php
    $i = 1;
    $pathCount = count($acoPath);
    foreach ($acoPath as $node) {
        if ($i == $pathCount) {
            echo '<li class="active"><a href="#">' . $acos_details[$node['Aco']['id']]['name'] . '</a></li>';
        } else {
            echo '<li><a href="#">' . $acos_details[$node['Aco']['id']]['name'] . ' </a></li>';
        }
        $i++;
    }
    ?>
</ul>

<em>
    <?php
    $method = end($acoPath);
    echo $acos_details[$method['Aco']['id']]['description'];
    ?>
</em>

<p>
<table class="table table-condensed table-striped table-bordered table-hover no-margin">
    <tr>
        <th class="header"><?php echo __('Group'); ?></th>                        
        <th class="header"><?php echo __('Actions'); ?></th>
    </tr>
    <?php
    $adminRoleName = array('admin', 'administrator');
    foreach ($aros as $roleName => $data):
        ?>
        <?php $data['allowed'] = (in_array(strtolower($roleName), $adminRoleName)) ? 1 : $data['allowed']; ?>
        <tr>
            <td align="left"><?php echo $roleName; ?></td>
            <td align="right">
                <?php
                if (in_array(strtolower($roleName), $adminRoleName)) {//Admin
                    echo $this->Html->image('/acl_management/img/icons/tick_disabled.png');
                } else {
                    ?>
                    <a href="javascript:;;" id="<?php echo 'permission-' . $acoPath[count($acoPath) - 1]['Aco']['id'] . '-' . $data['id']; ?>" onclick="<?php if ($roleName != 'Administrator'): ?>acos.toggle('<?php echo $this->Html->url('/acl_management/user_permissions/toggle'); ?>',<?php echo $acoPath[count($acoPath) - 1]['Aco']['id']; ?>, <?php echo $data['id']; ?>);return false;<?php endif; ?>">
                        <?php echo $this->Html->image('/acl_management/img/icons/allow-' . $data['allowed'] . '.png'); ?>
                    </a>
                    <?php
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</p>
