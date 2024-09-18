<?php

class UserRegistration {
    function handle($userData) {
        if (empty($userData)) {
            throw new Exception("Invali data");
        } 

        $userData['password'] = password_hash($userData['password'], PASSWORD_BCRYPT);

        $user = new UserModel();
        $user->name = $userData['name'];
        $user->email =  $userData['email'];
        $user->password = $userData['password'];
        $user->save();

        mail($userData['email'], "Registering succesful", 'Thanks for registering!');
    }
}
