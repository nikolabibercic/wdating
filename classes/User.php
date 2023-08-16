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
            $this->returnUser();
        }
    }

    public function register($email,$username,$password,$genderId,$countryId){
        if($this->checkEmailExist($email) || $this->checkUsernameExist($username)){
            $this->returnUser();
        }else{
            try{
                $sql = "insert into users(username,email,password,country_id,city,role_id,gender_id,profile_image,date_created,last_login,status_id) values('{$username}','{$email}','{$password}',{$countryId},null,2,{$genderId},null,current_timestamp(),null,null)";
                $query = $this->conn->prepare($sql);
                $query->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }

    public function returnUser(){
        if(!isset($_SESSION['userId'])){
            header("location: index.php");
            die();
        }
    }

    public function returnLoggedUser(){
        if(isset($_SESSION['userId'])){
            header("location: user_desh.php");
            die();
        }
    }

    public function isAdmin(){
        if(isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'){
            return true;
        }else{
            return false;
        }
    }

    public function genderList(){
        $sql = "select g.gender_id,g.gender 
                from sf_gender g";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $gender = $query->fetchAll(PDO::FETCH_OBJ);

        return $gender;
    }

    public function countryList(){
        $sql = "select c.country_id,c.country 
                from sf_country c
                order by c.country";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $countries = $query->fetchAll(PDO::FETCH_OBJ);

        return $countries;
    }

    public function checkEmailExist($email){
        $sql = "select email
                from users
                where email = '{$email}'";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $email = $query->fetch(PDO::FETCH_OBJ);

        if($query->rowCount()===1){
            return true;
        }
    }

    public function checkUsernameExist($username){
        $sql = "select username
                from users
                where username = '{$username}'";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $username = $query->fetch(PDO::FETCH_OBJ);

        if($query->rowCount()===1){
            return true;
        }
    }

    public function getUsers($search,$country){
        $sql = "select s.*,c.*
                from users s
                inner join sf_country c on c.country_id = s.country_id
                where s.username like '%{$search}%' and c.country like '%{$country}%' ";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_OBJ);

        return $users;
    }

}

?>