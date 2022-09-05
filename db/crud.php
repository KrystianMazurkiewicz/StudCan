<?php 
  class crud {
    private $db;

    function __construct($conn) {
      $this->db = $conn;
    }

    public function insert($fname, $lname) {
      try {
        $sql = "INSERT INTO names(first_name, last_name) VALUES (:fname, :lname);";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':fname', $fname);
        $stmt->bindparam(':lname', $lname);
        $stmt->execute();
        return true;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }
  }
?>