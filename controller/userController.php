<?php
  require_once("userModel.php");
  require_once("baseController.php");
  class userController extends baseController{
    public $view = "listUser.php";
    public $edit = "editUser.php";
    public $reload = "location: /user/danhsach";

    function __construct(){
      $this->model = new userModel();
      if(isset($_POST['username']) && isset($_POST['fullname']) && isset($_POST['maiaddres'])
        && isset($_POST['password']) && isset($_POST['dateofbirth']) && isset($_POST['avatar'])){
          $this->data = [$_POST['username'], $_POST['fullname'], $_POST['maiaddres'], $_POST['password'], $_POST['dateofbirth'], $_POST['avatar']];
        }
    }
  }