<?php 

  class read {
    private $db;
    
    function __construct($conn) {
      $this->db = $conn;
    }

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

    public function get_username_by_id($username) {
      try {
        $sql = "SELECT username FROM users WHERE username = :username";
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
        $sql = "SELECT username, status FROM student_has_internship WHERE internship_id = :id";
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
    
    public function get_info_about_profile($username) {
      try {
        $sql = "SELECT * FROM about_me WHERE username = :username";
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

    public function get_company_internships($co_name) {
      try {
        $sql = "SELECT * FROM internships WHERE co_name = :co_name";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':co_name', $co_name);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function get_post_ids_for_student($username) {
      try {
        $sql = "SELECT internship_id FROM student_has_internship WHERE username = :username ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function get_internships_for_student($id) {
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

    public function get_all_internships_from_company($co_name) {
      try {
        $sql = "SELECT post_title FROM internships WHERE co_name = :co_name";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':co_name', $co_name);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function get_internship_id_from_company_by_post_title($post_title) {
      try {
        $sql = "SELECT id FROM internships WHERE post_title = :post_title";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':post_title', $post_title);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function get_internship_by_id($id) {
      try {
        $sql = "SELECT * FROM internships WHERE id = :id";
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


    public function get_internship_status_to_user($username, $internship_id) {
      try {
        $sql = "SELECT status FROM student_has_internship WHERE username = :username AND internship_id = :internship_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':username', $username);
        $stmt->bindparam(':internship_id', $internship_id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    

    public function get_internship($id) {
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
        // $sql = "SELECT name FROM tags";
        $sql = "SELECT * FROM tags";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
        
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function get_user_role_by_username($username) {
      try {
        $sql = "SELECT role FROM users WHERE username = :username";
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


    // wtf is this doing here?
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

    // doesnt work
    public function get_highest_priority_status_for_student($username) {
      try {
        $sql = "SELECT status ORDER BY CASE 
        WHEN status = 'accepted' THEN 'Has internship' 
        WHEN status = 'invited' THEN 'Is invited'
        WHEN status = 'applied' THEN 'Has applied'
        WHEN status = 'denied' THEN 'Has no option'
        WHEN status = 'cancelled' THEN 'Has no option'
        ELSE 'Has not applied yet'
        END
        FROM student_has_internship WHERE username = :username";
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



    






  }
?>