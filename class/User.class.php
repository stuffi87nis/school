<?php


class User {
    
    private $db;
    public $id;
    public $name;
    public $email;
    public $acc_type;
    public $password;
    public $new_password;
    public $password_repeat;
    public $created_at;
    public $deleted_at;
    
    
    public function __construct($id = null) {
        $this->db = require 'db/db.inc.php';
        require_once 'Helper.class.php';
        
        if( $id ){
            $this->id = $id;
            $this->loadDb();
        }
    }
    
    public function loadDb(){
        $stmt_load = $this->db->prepare("
            SELECT * FROM `users`
            WHERE `id` = :id
            ");
        $stmt_load->execute([ ':id' => $this->id ]);
        
        $user = $stmt_load->fetch();
        
        if( $user ){
            $this->name = $user->name;
            $this->email = $user->email;
            $this->acc_type = $user->acc_type;
            $this->password = $user->password;
            $this->created_at = $user->created_at;
            $this->deleted_at = $user->deleted_at;
        }
    }
    
    public function isNameValid(){
        if($this->name == ""){
            Helper::addError("NAME IS EMPTY");
            return false;
        }
        return true;
    }
    
     public function isNameEmailValid(){
        if($this->email == ""){
            Helper::addError("EMAIL IS EMPTY");
            return false;
        }
        
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            Helper::addError("YOU NEED TO USE REAL EMAIL");
            return false;
        }
        
        
        $stmt_uniqueAdmin = $this->db->prepare("
            SELECT * FROM `users`
            WHERE `email` = :email
            ");
        $stmt_uniqueAdmin->execute([ ':email' => $this->email ]);
        
        $user = $stmt_uniqueAdmin->fetch();
        
        if($user && $user->id != self::getUserId()){
            Helper::addError("EMAIL IS ALREADY TAKEN");
            return false;
        }
        
        return true;
    }
    
         public function isPasswordValid(){
        if($this->new_password == ""){
            Helper::addError("PASSWORD IS EMPTY");
            return false;
        }
        
          if($this->new_password != $this->password_repeat){
            Helper::addError("PASSWORD NOT MATCH");
            return false;
        }
        
        
        
        return true;
    }
    
    public function insert(){
        
        if(!$this->isNameValid()){
            return false;
        }
        if(!$this->isNameEmailValid()){
            return false;
        }
        if(!$this->isPasswordValid()){
            return false;
        }
        
        $this->password = md5($this->new_password);
        
        $stmt_insert = $this->db->prepare("
            INSERT INTO `users`
            (`name`,`email`,`password`)
            VALUES
            (:name,:email,:password)
            ");
        $result = $stmt_insert->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':password' => $this->password
            ]);
        
        if( $result ){
            $this->id = $this->db->lastInsertId();
            $this->loadDb();
        }
        return $result;
    }
    
    public function login(){
        $stmt_login = $this->db->prepare("
            SELECT * FROM `users`
            WHERE `email` = :email
            AND `password` = :password
            ");
        $stmt_login->execute([
            ':email' => $this->email,
            ':password' => md5($this->password)
            ]);
        
        $user = $stmt_login->fetch();
        
        if( $user ) {
      Helper::addMessage('Login successfull!');
      Helper::sessionStart();
      $_SESSION['user_id'] = $user->id;
      return true;
      }
       Helper::addError('Invalid credentials.');
       return false;

    }
    
    public static function isUserLoggedIn(){
        require_once 'Helper.class.php';
        Helper::sessionStart();
        
        return isset($_SESSION['user_id']);
    }
    
    public static function getUserId(){
        require_once 'Helper.class.php';
        Helper::sessionStart();
        
        if(isset($_SESSION['user_id'])){
          return  $_SESSION['user_id'];
        }else{
            return false;
        }
    }
    
    public function loadUserFromDb(){
        require_once 'Helper.class.php';
        Helper::sessionStart();
        
        if(isset($_SESSION['user_id'])){
            $this->id = $_SESSION['user_id'];
            $this->loadDb();
        }
    }
}