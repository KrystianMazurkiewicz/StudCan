<?php 

  class create {
    private $db;
    
    function __construct($conn) {
      $this->db = $conn;
    }

    // public function insertUser($username, $password) {
    //   try {
    //     $result = $this->getUserbyUsername($username);
    //     if ($result['num'] > 0) return false;
      
    //     // Is this a good salt?
    //     // encrypt the password
    //     $new_password = $password.$username;

    //     $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bindparam(':username',$username);
    //     $stmt->bindparam(':password',$new_password);
    //     $stmt->execute();
    //     return true;

    //   } catch (PDOException $e) {
    //     echo $e->getMessage();
    //     return false;
    //   }
    // }


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

    public function insert_invitation_from_company($username, $internship_id, $status) {
      try {
        $sql = "INSERT INTO student_has_internship(username, internship_id, status) VALUES (:username, :internship_id, :status);";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':username', $username);
        $stmt->bindparam(':internship_id', $internship_id);
        $stmt->bindparam(':status', $status);
        $stmt->execute();
        return true;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function insert_applied_internship($username, $post_id) {
      try {
        $sql = "INSERT INTO student_has_internship(username, internship_id) VALUES (:username, :post_id);";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':username', $username);
        $stmt->bindparam(':post_id', $post_id);
        $stmt->execute();
        return true;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }
  }
?>