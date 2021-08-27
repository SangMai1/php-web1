<?php
  require_once("customerModel.php");
  require_once("baseController.php");
  class customerController extends baseController{
    public $view = "listCustomer.php";
    public $edit = "editCustomer.php";
    public $reload = "location: /customer/danhsach";

    function __construct(){
      $this->model = new customerModel();
      if(isset($_POST['fullname']) && isset($_POST['maiaddres']) && isset($_POST['phone'])
        && isset($_POST['dateofbirth'])){
          $this->data = [$_POST['fullname'], $_POST['maiaddres'], $_POST['phone'], $_POST['dateofbirth']];
        }
    }
  }