<?php
function call($controller, $action) {
    require_once('controllers/' . $controller . '-controller.php');

    switch($controller) {
        case 'pages':
            $controller = new PagesController();
            break;
        case 'posts':
            $controller = new PostsController();
            break;
        case 'classes':
            $controller = new ClassesController();
    }

    $controller->{ $action }();
}

$controllers = array(
    'pages' => ['home', 'error'],
    'posts' => ['index', 'show'],
    'classes' => ['index','show','addClass','addMethod']
);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}