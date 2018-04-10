<h3>Classes:</h3>

<ul>

    <?php foreach($classes as $menuitem) { ?>

        <li>

            <a href='?controller=classes&action=show&id=<?php echo $menuitem->id; ?>'><?php echo $menuitem->class; ?></a>

            <?php
                if( $menuitem instanceof Methods ) {
                    ?>

                            <li class="method">
                                <a href='?controller=classes&action=show&id=<?php echo $menuitem->class_id; ?>'><?php echo $menuitem->name; ?></a>
                            </li>
                    <?php
                }
            ?>

        </li>

    <?php } ?>

</ul>