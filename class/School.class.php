<?php



class School {
    
    private $db;
    public $id;
    public $title;

    
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
            SELECT * FROM `students`
            WHERE `id` = :id
            ");
        $stmt_load->execute([ ':id' => $this->id ]);
        
        $school = $stmt_load->fetch();
        
        if( $school ){
            $this->title = $school->title;
        }
    }
    
    public function insert(){
        $stmt_insert = $this->db->prepare("
            INSERT INTO `schools`
            (`title`)
            VALUES
            (:title)
            ");
        return $stmt_insert->execute([ ':title' => $this->title ]);
        
    }
        
    public function delete(){
        $stmt_delete = $this->db->prepare("
            DELETE FROM `schools`
            WHERE `id` = :id
            ");
        return $stmt_delete->execute([ ':id' => $this->id ]);
    }
    
    
    public function all(){
        $stmt_all = $this->db->prepare("
            SELECT * FROM `schools`
            ");
        $stmt_all->execute();
        return $stmt_all->fetchAll();
    }
}