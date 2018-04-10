<div class="container-fluid">

    <div class="row">

        <div class="col-sm-3" id="class-admin-menu">

            <?php require_once( 'views/classes/admin-menu.php' ); ?>

            <?php require_once( 'views/classes/class-menu.php' ); ?>

        </div>

        <div class="col-sm-9">

            <?php

            if( $method ) {
                ?>

                <span class="row col-sm-10 offset-sm-1 alert alert-info"><?php echo $method; ?></span>

                <?php
            }
            ?>

            <h2>Add Method:</h2>

            <form action="?controller=classes&action=addMethod" method="post">

                <div class="row">
                    <div class="col-sm-2">
                        <label for="methodClass">Associated Class</label>
                    </div>
                    <div class="col-sm-4">
                        <select id="methodClass" name="methodClass">
                            <option value="0">Please select a class</option>
                            <?php
                                foreach( $selectClasses as $selectClass ) {
                                    echo $selectClass;
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <label for="methodName">Name</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="methodName" name="methodName" value="" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <label for="methodDescription">Description</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="methodDescription" name="methodDescription" value="" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <label for="methodVariables">Variables</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="methodVariables" name="methodVariables" value="" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <label for="methodReturns">Returns</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="methodReturns" name="methodReturns" value="" />
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