<?php
class Methods {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $name;
    public $description;
    public $variables;
    public $returns;
    public $class_id;


    public function __construct($id, $name, $description, $variables, $returns, $class_id) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->variables = $variables;
        $this->returns = $returns;
        $this->class_id = $class_id;
    }

    public static function getMethodsByClassId($id) {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM methods where class_id = ' . $id);

        foreach($req->fetchAll() as $method) {
            $list[] = new Methods($method['id'], $method['name'], $method['description'], $method['variables'], $method['returns'], $method['class_id']);
        }

        return $list;
    }

    public static function add_method( $methodClass, $methodName, $methodDescription, $methodVariables, $methodReturns ) {
        $db = Db::getInstance();

        // First check to see if method already exists or not.
        $req = $db->prepare( "SELECT * FROM methods WHERE class_id = :methodClass");
        $req->execute(array('methodClass' => $methodClass));
        $count = 0;
        foreach($req->fetchAll() as $methods ) {
            $count++;
        }

        if( $count >= 1 ) {
            $msg = 'Sorry, this method name already exists. Please try again.';
            return $msg;
        } else {
            if( $db->query("INSERT INTO methods (`name`, `description`, `variables`, `returns`, `class_id`) VALUES ( '$methodName', '$methodDescription', '$methodVariables', '$methodReturns', $methodClass)") ) {
                $msg = 'Method added to DB';
            } else {
                $msg = 'There was a problem with adding this method to the DB.';
            }
            return $msg;
        }
    }
}