<?php 

  class delete {
    private $db;
    
    function __construct($conn) {
      $this->db = $conn;
    }

    public function delete($id) {
      try {
        $sql = "DELETE FROM `internships` WHERE `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        return true;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function remove_student_from_internship($user_id, $internship_id) {
      try { 
        $sql = "DELETE FROM `student_has_internship` WHERE `user_id` = :user_id AND internship_id = :internship_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user_id', $user_id);
        $stmt->bindparam(':internship_id', $internship_id);
        $stmt->execute();
        return true;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }  
    }
    

    
  }
?>