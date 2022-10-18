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

    public function remove_student_from_internship($username, $internship_id) {
      try { 
        $sql = "DELETE FROM `student_has_internship` WHERE `username` = :username AND internship_id = :internship_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':username', $username);
        $stmt->bindparam(':internship_id', $internship_id);
        $stmt->execute();
        return true;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }  
    }

    public function delete_application($username, $internship_id) {
      try { 
        $sql = "DELETE FROM `student_has_internship` WHERE `username` = :username AND internship_id = :internship_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':username', $username);
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