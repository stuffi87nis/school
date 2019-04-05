<?php



class Student {
    
    private $db;
    public $id;
    public $school_id;
    public $first_name;
    public $last_name;
    public $grades;
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
            SELECT * FROM `students`
            WHERE `id` = :id
            ");
        $stmt_load->execute([ ':id' => $this->id ]);
        
        $student = $stmt_load->fetch();
        
        if( $student ){
            $this->first_name = $student->first_name;
            $this->last_name = $student->last_name;
            $this->school_id = $student->school_id;
            $this->grades = $student->grades;
            $this->created_at = $student->created_at;
            $this->deleted_at = $student->deleted_at;
        }
    }
    
    public function insert(){
        $stmt_insert = $this->db->prepare("
            INSERT INTO `students`
            (`first_name`,`last_name`,`grades`)
            VALUES
            (:first_name,:last_name,:grades)
            ");
        $students = $stmt_insert->execute([
            ':first_name' => $this->first_name,
            ':last_name' => $this->last_name,
            ':grades' => $this->grades
            ]);
        
        if($students){
            $this->id = $this->db->lastInsertId();
            $this->loadDb();
        }
    }
    
    public function all(){
        $stmt_all = $this->db->prepare("
            SELECT * FROM `students`
            ");
        $stmt_all->execute();
        return $stmt_all->fetchAll();
    }
    
    public function averageGrades(){
        $stmt_avg = $this->db->prepare("
            SELECT AVG(grades) as avg_grades
            FROM `student_grades`
            WHERE `student_id` = :student_id
            ");
        $stmt_avg->execute([ ':id' => $this->id ]);
        return $stmt_avg->fetch()->avg_grades;
    }
}