<?php
  require_once "baseModel.php";
  class customerModel extends baseModel {
    public $tableName = "customer";
    public $fieldName = ["fullname", "maiaddres", "phone", "dateofbirth"];
    public $fieldId = "no";
  }