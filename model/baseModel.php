<?php
  require_once("DB.php");
  class baseModel {
    public $tableName = "";
    public $fieldName = [];
    public $fieldId = "";

    function xoa($id){
      $sql = "delete from ". $this->tableName ." where ".$this->fieldId."= ".$id;
      return DB::executeUpdate($sql);
    }

    function list(){
      $sql = "select * from " . $this->tableName;
      return DB::executeQuery($sql);
    }

    function insert($data){
      $sql = "insert into ". $this->tableName."(".$this->fieldId.",".implode(",",$this->fieldName).") value(?". str_repeat(",?", count($this->fieldName)).")";
      return DB::executeUpdate($sql, $data);
    }

    function update($id, $data){
      $temp = $this->fieldName;
      $sql1 = "";
      for($i = 0; $i < count($temp) - 1; $i++) {
        $sql1 = $sql1.$temp[$i]."=?,";
      }
      $sql1 = $sql1.$temp[count($temp) - 1]."=?";

      $sql = "update ". $this->tableName." set ".$sql1." where ".$this->fieldId."= ".$id;
      
      return DB::executeUpdate($sql, $data);
    }

    function findById($id) {
      $sql = "select * from ". $this->tableName." where ".$this->fieldId."= ".$id;
      return DB::executeQuery($sql);
    }

    function addOrEdit($id){
      $result = $this->findById($id);
      if(count($result) > 0){
        return $result;
      } else {
        return "";
      }
    }
  }