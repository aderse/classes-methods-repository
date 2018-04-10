<div class="container-fluid">

    <div class="row">

        <?php require_once( 'views/classes/class-menu.php' ); ?>

        <div class="col-sm-6">

            <?php

                if( $post ) {
                    ?>

                    <span class="row col-sm-10 offset-sm-1 alert alert-info"><?php echo $post; ?></span>

                    <?php
                }
            ?>

            <h2>Add Class:</h2>

            <form action="?controller=classes&action=addClass" method="post">

                <div class="row">
                    <div class="col-sm-2">
                        <label for="className">Class Name</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="className" name="className" value="" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <label for="classDescription">Description</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="classDescription" name="classDescription" value="" />
                    </div>
                </div>

                <div class="row">
                    <div class="offset-sm-2 col-sm-4">
                        <input type="submit" value="Submit" />
                    </div>
                </div>
            </form>

        </div>

        <?php require_once( 'views/classes/admin-menu.php' ); ?>

    </div>

</div>