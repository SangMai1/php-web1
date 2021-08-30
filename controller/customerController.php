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

    function thuchienSearchAction(){
      $search = $_GET["search"];
      $search1 = $_GET["search"];
      if(empty($search)){
            echo "Yeu cau nhap du lieu vao o trong";
      } else {
        $db = new PDO("mysql:dbname=web-php;host=localhost", "root", "12345");
        $sth = $db->prepare("select * from customer where phone = ? or maiaddres = ? ");
        $sth->execute([$search, $search1]);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        include "search.php";

      }
    }

    function successSearchAction(){
      include "search.php";
    }
  }