<?php 
 
class User {
    private $users = [
        1 => ['id' => 1, 'name'=> 'Alice'],
        2 => ['id' => 2, 'name'=> 'Bob'],
    ];

    public function getUserById($id){
        return isset($this-> users[$id])? $this-> users[$id] : null;
    }
}