<?php


class Helper {
    
    
    public static function sessionStart(){
        
        if(!isset($_SESSION)){
            session_start();
        }
    }
    
    public static function addError($e){
        self::sessionStart();
        
        $_SESSION['error'] = $e;
    }
    
    public static function getError(){
        self::sessionStart();
        $e = null;
        
        if(isset($_SESSION['error'])){
            $e = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        return $e;
    }
    
    
    
        public static function addMessage($m){
        self::sessionStart();
        
        $_SESSION['message'] = $m;
    }
    
    public static function getMessage(){
        self::sessionStart();
        $m = null;       
                
                
        if(isset($_SESSION['message'])){
            $m = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        return $m;
    }
    
}