<?php
  class DB {
    // function __construct(){
    //   $this->db = new PDO("mysql:dbname=web-php;host=localhost", "root", "12345");
    // }

    // function execute($sql){
    //   $sth = $this->db->prepare($sql);
    //   $sth->execute();
    // }

    // function executeData($sql, $data){
    //   $sth = $this->db->prepare($sql);
    //   $sth->execute($data);
    // }

    // function result($sql){
    //   $sth = $this->db->preprare($sql);
    //   $sth->execute();
    //   $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    //   return $result;
    // }

    // function resultData($sql, $data){
    //   $sth = $this->db->prepare($sql);
    //   $sth->execute($data);
    //   $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    //   return $result;
    // }

    private static function getConnnection(){
      return new PDO("mysql:dbname=web-php;host=localhost", "root", "12345");
    }

    public static function executeQuery($sql, $params = null) {
      $conn = DB::getConnnection();
      $sth = $conn ->prepare($sql);
      $sth -> execute($params);
      $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

    public static function executeUpdate($sql, $params = null) {
      $conn = DB::getConnnection();
      $sth = $conn ->prepare($sql);
      $sth -> execute($params);
      return $sth -> rowCount();
    }
  }