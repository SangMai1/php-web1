<?php
  require_once "baseModel.php";
  class userModel extends baseModel {
    public $tableName = "user";
    public $fieldName = ["username", "fullname", "maiaddres", "password", "dateofbirth", "avatar"];
    public $fieldId = "no";
  }