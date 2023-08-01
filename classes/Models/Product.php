<?php
namespace TechStore\Classes\Models;
use TechStore\Classes\Db;
class Product extends Db 
{
    public function __construct()
    {
        $this->table = "products";
        $this->connect();
    }
    
  public function selectId($id, string $fields = "products.*")
  {
    $sql = "SELECT $fields FROM `$this->table` JOIN cats ON $this->table.cat_id = cats.id WHERE products.id = '$id'";
    $result = mysqli_query($this->conn, $sql);
    return mysqli_fetch_assoc($result);
    // $result = $this->conn->query($sql);
    // return  $result->fetch_assoc();
  }

  public function selectAllWithCats(string $fields = "*"): array
  {
    $sql = "SELECT $fields FROM `$this->table` JOIN cats ON $this->table.cat_id = cats.id ORDER BY $this->table.id DESC";
    $result = mysqli_query($this->conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    // $result = $this->conn->query($sql);
    // return $result->fetch_all(1);
  }
}