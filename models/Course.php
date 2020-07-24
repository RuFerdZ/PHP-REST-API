<?php
    
    class Course{
        private $conn;
        private $table = 'courses';

        // properties
        private $id = '';
        private $course_title;
        private $course_description;
        private $course_deadline;

        // Constructor
        public function __construct($db,$course_title, $course_description, $course_deadline){
            $this->conn = $db;
            $this->course_title = $course_title;
            $this->course_description = $course_description;
            $this->course_deadline = $course_deadline;
        }

        // getter and setter methods
        public function setID($id){
            $this->id = $id;
        }

        public function setTitle($course_title){
            $this->course_title = $course_title;
        }

        public function setDescription($course_description){
            $this->course_description = $course_description;
        }

        public function setDeadline($course_deadline){
            $this->course_deadline = $course_deadline;
        }

        public function getID(){
            return $this->id;
        }

        public function getTitle(){
            return $this->course_title;
        }

        public function getDescription(){
            return $this->course_description;
        }

        public function getDeadline(){
            return $this->course_deadline;
        }


        // method to add a course
        public function addCourse(){
            // create query
            $query = 'INSERT INTO '.$this->table. ' SET 
            course_title = :course_title,
            course_description = :course_description,
            course_deadline = :course_deadline';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean data
            $this->course_title = htmlspecialchars(strip_tags($this->course_title)); 
            $this->course_description = htmlspecialchars(strip_tags($this->course_description)); 
            $this->course_deadline = htmlspecialchars(strip_tags($this->course_deadline)); 
        

            // binding parameters
            $stmt->bindParam(':course_title', $this->course_title);
            $stmt->bindParam(':course_description', $this->course_description);
            $stmt->bindParam(':course_deadline', $this->course_deadline);
         

            // execute query
            if($stmt->execute()){
                return true;
            }else{
                printf("ERROR %s. \n", $stmt->error);
                return false;
            }
        }


        // method to update an existing course
        public function updateCourse(){

            // create query
            $query = 'UPDATE '.$this->table. ' SET 
            course_description = :course_description,
            course_deadline = :course_deadline 
            WHERE id = :id';

            // prepare statement
            $stmt = $this->conn->prepare($query);

    
            // clean data
            $this->course_description = htmlspecialchars(strip_tags($this->course_description)); 
            $this->course_deadline = htmlspecialchars(strip_tags($this->course_deadline));  
            $this->id = htmlspecialchars(strip_tags($this->id)); 

            // binding parameters
            $stmt->bindParam(':course_description', $this->course_description);
            $stmt->bindParam(':course_deadline', $this->course_deadline);
            $stmt->bindParam(':id', $this->id);

            // execute query
            if($stmt->execute()){
                return true;
            }else{
                printf("ERROR %s. \n", $stmt->error);
                return false;
            }
        }


    }

?>