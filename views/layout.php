<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="/mvctest/includes/css/default.css" rel="stylesheet">
    </head>
    <body class="container-fluid">

        <header class="row">
            <div class="container">

                <?php require_once ('models/menu.php'); ?>

                <?php

                    $mainMenu = new Menu();
                    $mItems = $mainMenu::getMenuItemsByParentId(1);

                    foreach( $mItems as $item ) {
                        ?>

                        <a href="<?php echo $item['link']; ?>"><?php echo $item['name']; ?></a>

                        <?php
                    }
                ?>

            </div>
        </header>

        <section class="main-content">

            <?php require_once('routes.php'); ?>

        </section>

        <footer class="row text-center">
            <div class="container">
                <p>&copy; FCS - <?php echo date('Y'); ?></p>
            </div>
        </footer>
    <body>
<html>