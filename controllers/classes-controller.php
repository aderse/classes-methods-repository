<?php

require_once('models/classes.php');
require_once('models/methods.php');

class ClassesController {
    public function index() {
        // we store all the posts in a variable
        $classes = Classes::all();
        require_once('views/classes/index.php');
    }

    public function show() {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id']))
            return call('classes', 'error');

        // we use the given id to get the right post
        $classes = Classes::all();
        $class = Classes::find($_GET['id']);
        $methods = Methods::getMethodsByClassId($_GET['id']);
        require_once('views/classes/show.php');
    }

    public function addClass() {
        if( $_POST['className'] ) {
            $className = htmlentities($_POST['className']);
            $classDesc = htmlentities($_POST['classDesc']);
            $post = Classes::add_class( $className, $classDesc );
        }
        $classes = Classes::all();
        require_once('views/classes/add-class.php');
    }

    public function addMethod() {
        if( $_POST['methodName'] && $_POST['methodClass'] ) {
            $methodClass        = htmlentities( $_POST['methodClass'] );
            $methodName         = htmlentities( $_POST['methodName'] );
            $methodDescription  = htmlentities( $_POST['methodDescription'] );
            $methodVariables    = htmlentities( $_POST['methodVariables'] );
            $methodReturns      = htmlentities( $_POST['methodReturns'] );

            $method = Methods::add_method( $methodClass, $methodName, $methodDescription, $methodVariables, $methodReturns );
        } else {
            if( $_POST ) {
                $method = 'There was a problem with the request. Please try again.';
            }
        }
        $selectClasses = Classes::set_select_list();
        $classes = Classes::all();
        require_once('views/classes/add-method.php');
    }
}