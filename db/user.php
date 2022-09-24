<?php 

  class user {
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

    //REAL ONE REAL ONE REAL ONE REAL ONE REAL ONE
    // public function getUser($username, $password) {
    //   try {
    //     $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bindparam(':username', $username);
    //     $stmt->bindparam(':password', $password);
    //     $stmt->execute();
    //     $result = $stmt->fetch();
    //     return $result;

    //   } catch (PDOException $e) {
    //     echo $e->getMessage();
    //     return false;
    //   }
    // }
    public function getUser($username) {
      try {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function get_username_by_id($id) {
      try {
        $sql = "SELECT username FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    // public function getUserbyUsername($username) {
    //   try {
    //     $sql = "SELECT count(*) AS num FROM users WHERE username = :username";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bindparam(':username', $username);
    //     $stmt->execute();
    //     $result = $stmt->fetch();
    //     return $result;

    //   } catch (PDOException $e) {
    //     echo $e->getMessage();
    //     return false;
    //   }
    // }

    public function get_user_id_by_username($username) {
      try {
        $sql = "SELECT id FROM users WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function get_student_that_is_interested_in_internship($id) {
      try {
        $sql = "SELECT user_id, status FROM student_has_internship WHERE internship_id = :id";
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




    
    public function getUsers() {
      try {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        return $result;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }
    
    public function get_info_about_profile($id) {
      try {
        $sql = "SELECT * FROM about_me WHERE user_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    
  }
?>