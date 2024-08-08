<?php

class Database{

public $conn;


public function __construct($config){
  $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

  $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ];

  try {
    $this->conn =   new PDO($dsn, $config['username'], $config['password'], $options);
    echo "db connected";
  } catch (PDOException $e) {
    throw new Exception("Connection failed: " . $e->getMessage());
    
  }
}

 public function query($query,$params = []) {
try {
  $sth = $this->conn->prepare($query);

  //bind params

  foreach($params as $param => $value){
    $sth->bindValue(':' . $param , $value);
  }

  $sth->execute();
  return $sth;
} catch (PDOException $e) {
  throw new Exception("Query failed: " . $e->getMessage());
}
 }

}