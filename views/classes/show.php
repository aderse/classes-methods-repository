<div class="container-fluid">

    <div class="row">

        <div class="col-sm-3" id="class-admin-menu">

            <?php require_once( 'views/classes/admin-menu.php' ); ?>

            <?php require_once( 'views/classes/class-menu.php' ); ?>

        </div>


        <div class="col-sm-9">

            <h2><?php echo $class->class; ?></h2>

            <p><?php echo $class->description; ?></p>

            <hr />

            <ul class="class-methods-list">


                <?php foreach($methods as $method) { ?>

                    <li>

                        <a href='?controller=classes&action=show&id=<?php echo $method->id; ?>'><?php echo $method->name; ?></a>

                        <br />

                        <p> - Description: <br />

                            <i class="innerMethod"><?php echo $method->description; ?></i>

                        </p>

                        <?php if( $method->variables != '' ) { ?>

                            <p> - Variables: <br />

                                <i class="innerMethod"><?php echo $method->variables; ?></i>

                            </p>

                        <?php } ?>

                        <?php if( $method->returns != '' ) { ?>

                            <p> - Returns: <br />

                                <i class="innerMethod"><?php echo $method->returns; ?></i>

                            </p>

                        <?php } ?>

                        <hr />

                    </li>

                <?php } ?>

            </ul>

        </div>



    </div>

</div>