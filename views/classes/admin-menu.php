<?php

$classMenu = new Menu();
$cMName = $classMenu::getMenuNameById(2);

?>

<h3><?php echo $cMName; ?></h3>

<ul>

    <?php

    $cMItems = $classMenu::getMenuItemsByParentId(2);
    foreach( $cMItems as $item ) {
        ?>

        <li><a href="<?php echo $item['link']; ?>"><?php echo $item['name']; ?></a></li>

        <?php
    }
    ?>

</ul>

