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

  }
?>