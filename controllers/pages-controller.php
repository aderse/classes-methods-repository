<?php
class PagesController {
    public function home() {
        $first_name = 'Andrew';
        $last_name  = 'Derse';
        require_once('views/pages/home.php');
    }

    public function error() {
        require_once('views/pages/error.php');
    }
}