<?php
namespace TechStore\Classes;

// require_once ("app.php");

class Db
{
    protected $table;
    protected $conn;

    public function connect()
    {
        $this->conn = mysqli_connect(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_NAME);
        // if (!$this->conn) {
        //     die("error in connection");
        // }
    }
    public function selectAll(string $fields = "*"):array
    {
        $sql = "select $fields from $this->table";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function selectId($id, string $fields = "*")
    {
        $sql = "select $fields from $this->table where id=$id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    public function selectWhere($conds, string $fields = "*"): array
    {
        $sql = "select $fields from $this->table where $conds";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function getCount(): int
    {
      $sql    = "SELECT COUNT(*) AS cnt FROM `$this->table` ";
      $result = mysqli_query($this->conn, $sql);
      return mysqli_fetch_assoc($result)["cnt"];
    //   $result = $this->conn->query($sql);
    //   return $result->fetch_assoc()["cnt"];
    }
    // public function getCount()
    // {
    //     $sql = "select COUNT(*) AS cnt from $this->table";
    //     $result = mysqli_query($this->conn, $sql);
    //     return mysqli_fetch_all($result);
    //   //return mysqli_fetch_all($result)['cnt'];
    // }

    public function insert(string $fields,string $values):bool
    {
        $sql = "insert into $this->table($fields) values ($values)";
        return mysqli_query($this->conn, $sql);
        // if (mysqli_query($this->conn, $sql)) {
        //    return true;
        // }else{
        //     return false; 
        // }
    }
    
  public function insertAndGetId(string $fields, string $value)
  {
    $sql = "INSERT INTO $this->table ($fields) VALUES ($value)";
    $this->conn->query($sql);
    return $this->conn->insert_id;
  }
    public function update($set, $id):bool
    {
        $sql = "update $this->table set $set where id=$id";
        return mysqli_query($this->conn, $sql);
    }
    public function delete($id):bool
    {
        $sql = "delete from $this->table where id=$id";
        return mysqli_query($this->conn, $sql);
    }

}
