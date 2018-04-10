<?php
class Menu {

    public static function getMenuNameById($id) {
        $db = Db::getInstance();
        $req = $db->query('SELECT `name` FROM `menus` WHERE `id` = ' . $id );
        $req->execute(array('id' => $id));
        $menu = $req->fetch();
        return $menu['name'];
    }
    public static function getMenuItemsByParentId($id) {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT `id`, `name`, `link` FROM `menu_items` WHERE `parent` = ' . $id );

        // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $menu) {
            $list[] = array( "id" => $menu['id'], "name" => $menu['name'], "link" => $menu['link']);
        }

        return $list;
    }

}