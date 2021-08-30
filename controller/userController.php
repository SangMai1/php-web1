<?php
  require_once("userModel.php");
  require_once("customerModel.php");
  require_once("baseController.php");
  class userController extends baseController{
    public $view = "listUser.php";
    public $edit = "editUser.php";
    public $mail = "sendMail.php";
    public $reload = "location: /user/danhsach";

    function __construct(){
      $this->model = new userModel();
      if(isset($_POST['username']) && isset($_POST['fullname']) && isset($_POST['maiaddres'])
        && isset($_POST['password']) && isset($_POST['dateofbirth']) && isset($_POST['avatar'])){
          $this->data = [$_POST['username'], $_POST['fullname'], $_POST['maiaddres'], $_POST['password'], $_POST['dateofbirth'], $_POST['avatar']];
        }
    }

    public static function showLoginAction(){
      unset($_SESSION['email']);
      unset($_SESSION['username']);
      unset($_SESSION['avatar']);
      setcookie('us', "", time()-1, '/'); 
      setcookie('pa', "",time() -1, '/'); 
      include "login.php";
    }

    public static function successLoginAction(){
      echo "login thanh cong";
    }

    public static function logoutAction(){
      unset($_SESSION['email']);
      unset($_SESSION['username']);
      unset($_SESSION['avatar']);
      setcookie('us', "", time()-1, '/'); 
      setcookie('pa', "",time() -1, '/'); 
      header("location:/user/hienthidangnhap");
      
    }

    public static function doLoginAction(){
      $email = $_POST["email"];
      $pass = $_POST["password"];
      $db = new PDO("mysql:dbname=web-php;host=localhost", "root", "12345");
      $sth = $db->prepare("select username, avatar, maiaddres, password from user where maiaddres = ?");
      $sth->execute([$email]);
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);

      if(count($result) > 0){
        if($pass == $result[0]["password"]){
          $_SESSION["email"] = $email;
          $_SESSION['username'] = $result[0]['username'];
          $_SESSION['avatar'] = $result[0]['avatar'];
          $usersem = $result[0]['maiaddres'];
          $userspa = $result[0]['password'];
          if(isset($_POST['checkRemember'])){
               setcookie('us', $usersem, time()+3600, '/', '', 0, 0);
               setcookie('pa', $userspa, time()+3600, '/', '', 0, 0);
            }
          header("Location: /user/danhsach");
        } else {
          unset($_SESSION["email"]);
          $messageError = "email or pass khong chinh xac";
          include "login.php";
        }
      } else {
        unset($_SESSION['email']);
        $messageError = "email or pass khong chinh xac";
        include "login.php";
      }
    }
  }