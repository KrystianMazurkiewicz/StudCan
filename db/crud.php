<?php 
  class crud {
    private $db;

    function __construct($conn) {
      $this->db = $conn;
    }

    public function insert($co_name, $post_title, $post_description, $co_website) {
      try {
        $sql = "INSERT INTO internships(co_name, post_title, post_description, co_website) VALUES (:co_name, :post_title, :post_description, :co_website);";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':co_name', $co_name);
        $stmt->bindparam(':post_title', $post_title);
        $stmt->bindparam(':post_description', $post_description);
        $stmt->bindparam(':co_website', $co_website);
        $stmt->execute();
        return true;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }
    
    public function edit($id, $co_name, $post_title, $post_description, $co_website) {
      try { 
        $sql = "UPDATE `internships` SET `co_name`=:co_name, `post_title`=:post_title, `post_description`=:post_description, `co_website`=:co_website WHERE `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->bindparam(':co_name', $co_name);
        $stmt->bindparam(':post_title', $post_title);
        $stmt->bindparam(':post_description', $post_description);
        $stmt->bindparam(':co_website', $co_website);
        $stmt->execute();
        return true;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }  
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

    public function getAllInternships() {
      try {
        $sql = "SELECT * FROM internships";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function get_internships($id) {
      try {
        $sql = "SELECT * FROM internships WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }
    
    public function getAllPossibleTags() {
      try {
        $sql = "SELECT name FROM tags";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function insert_applied_internship($post_id, $user_id) {
      try {
        $sql = "INSERT INTO student_has_internship(user_id, internship_id) VALUES (:post_id, :user_id);";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':post_id', $post_id);
        $stmt->bindparam(':user_id', $user_id);
        $stmt->execute();
        return true;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function get_applied_internship($id) {
      try {
        $sql = "SELECT internship_id FROM student_has_internship WHERE user_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

   

  }
?>