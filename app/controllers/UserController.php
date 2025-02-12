<?php 

// Handles user profile page
require_once '../app/Models/User.php';
class UserController {
    public function profile($id){
        $user = new User();
        $userDat= $user->getUserById($id);
        require_once '../app/Views/users/profile.php';


    }
}