<?php

class User extends ConnectionBuilder {

    public function login($email,$password){
        $sql = "select u.user_id,u.email,u.username,u.city,c.country,r.role 
                from users u
                inner join sf_country c on c.country_id = u.country_id
                inner join sf_role r on r.role_id = u.role_id 
                where u.email = '{$email}' and u.password = '{$password}' ";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_OBJ);
        if($query->rowCount()===1){
            header("Location: user_desh.php");
            $_SESSION['userId'] = $user->user_id;
            $_SESSION['email'] = $user->email;
            $_SESSION['username'] = $user->username;
            $_SESSION['city'] = $user->city;
            $_SESSION['country'] = $user->country;
            $_SESSION['role'] = $user->role;
        }else{
            header("Location: index.php");
        }
    }

    public function returnUser(){
        if(!isset($_SESSION['userId'])){
            header("location: index.php");
        }
    }

    public function isAdmin(){
        if(isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'){
            return true;
        }else{
            return false;
        }
    }

}

?>