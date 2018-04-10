<?php
class Classes {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $class;
    public $description;



    public function __construct($id, $class, $description) {
        $this->id      = $id;
        $this->class  = $class;
        $this->description   = $description;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM classes ORDER BY class ASC');

        // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $class) {
            $list[] = new Classes($class['id'], $class['class'], $class['description']);

            // Now we search for methods...
            $db2 = Db::getInstance();
            $req = $db2->prepare('SELECT * FROM methods WHERE class_id = :id');
            $req->execute(array( 'id' => $class['id'] ) );
            foreach( $req->fetchAll() as $method ) {
                $list[] = new Methods( $method['id'], $method['name'], $method['description'], $method['variables'], $method['returns'], $method['class_id'] );
            }
        }

        return $list;
    }

    public static function set_select_list() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM classes ORDER BY class ASC');

        // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $class) {
            $list[] = "<option value='" . $class['id'] . "'>" . $class['class'] . '</option>';
        }

        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM classes WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $class = $req->fetch();

        return new Classes($class['id'], $class['class'], $class['description']);
    }

    public static function add_class( $className, $classDesc ) {
        $db = Db::getInstance();

        // First check to see if class already exists or not.
        $req = $db->prepare( "SELECT count(class) FROM classes WHERE class = :className");
        $req->execute(array('className' => $className));
        $count = $req->fetch();

        if( $count >= 1 ) {
            $msg = 'Sorry, this class name already exists. Please try again';
            return $msg;
        } else {
            if( $db->query("INSERT INTO classes (`class`, `description`) VALUES ( '$className', '$classDesc')") ) {
                $msg = 'Class added to DB';
            } else {
                $msg = 'There was a problem with adding this class to the DB.';
            }
            return $msg;
        }
    }

}