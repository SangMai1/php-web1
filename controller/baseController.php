<?php
  use PHPMailer\PHPMailer\PHPMailer;
  require_once("PHPMailer.php");
  require_once("SMTP.php");
  require_once("Exception.php");
  class baseController {
    public $model = null;

    function deleteAction(){
      $id = $_GET["no"];
      $this->model->xoa($id);
      header($this->reload);
    }

    function listAction(){
      $result = $this->model->list();
      include($this->view);
    }

    function addOrEditAction(){
      if (!isset($_GET["no"])) {
        $id = 0;
      } else {
        $id = $_GET["no"];
      }
      $result = $this->model->addOrEdit($id);
      include($this->edit);
    }

    function saveAction(){
      $id = $_POST["no"];

      $result = $this->model->findById($id);

      if(count($result) > 0) {
        if(isset($_POST["submit"]) && !empty($_FILES["avatar"]["name"])){
            $targetDir = "uploads/";
            $fileName = basename($_FILES["avatar"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
              // Upload file to server
                if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    
                    $this->model = new userModel();
                    $this->data = [$_POST['username'], $_POST['fullname'], $_POST['maiaddres'], $_POST['password'], $_POST['dateofbirth'], $targetFilePath];
                    var_dump($this->data);
                    $yes = $this->model->update($id, $this->data);
                    if($yes){
                        echo "done";
                    }else{
                        echo "false";
                    } 
                }
            }
            // $_POST['avatar'] = "uploads/" . basename ($_FILES["avatar"]["name"]);
            // move_uploaded_file($_FILES["avatar"]["tmp_name"], $_POST['avatar']);
            // $id = rand(0, 9999);
            // array_unshift($this->data,$id);
            // var_dump($this->data);
            // $this->model->insert($this->data);
          } else {
            $this->model->update($id, $this->data);
            // header($this->reload);
          }

      } else {
        
          if(isset($_POST["submit"]) && !empty($_FILES["avatar"]["name"])){
            $targetDir = "uploads/";
            $fileName = basename($_FILES["avatar"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
              // Upload file to server
                if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    
                    $this->model = new userModel();
                    $this->data = [$_POST['username'], $_POST['fullname'], $_POST['maiaddres'], $_POST['password'], $_POST['dateofbirth'], $targetFilePath];
                    $id = rand(0, 9999);
                    array_unshift($this->data, $id);
                    var_dump($this->data);
                    $yes = $this->model->insert($this->data);
                    if($yes){
                        echo "done";
                    }else{
                        echo "false";
                    } 
                }
            }
            // $_POST['avatar'] = "uploads/" . basename ($_FILES["avatar"]["name"]);
            // move_uploaded_file($_FILES["avatar"]["tmp_name"], $_POST['avatar']);
            // $id = rand(0, 9999);
            // array_unshift($this->data,$id);
            // var_dump($this->data);
            // $this->model->insert($this->data);
          } else {
            $id = rand(0, 9999);
            array_unshift($this->data,$id);
            var_dump($this->data);
            $this->model->insert($this->data);
          }
        // header($this->reload);
      }
    }

    function mailAction(){
      $this->model = new customerModel();
      $result = $this->model->list();
      include ($this->mail);
    }

    function sendMailAction(){
      if(isset($_POST['submit'])){

        $mail = new PHPMailer();
  
        $email = $_POST['sendall'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];

        //smtp settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "gaug90411@gmail.com";
        $mail->Password = 'maivangau';
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //email settings

        $mail->isHTML(true);
        $mail->setFrom($email, $subject);
        foreach($email as $asdas){
          $mail->addAddress($asdas);
        }
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if($mail->send()){
          header("location:/user/sendmailthanhcong");
        } else {
          header("location:/user/sendmailthatbai");
        }

      }    
    }

    function sendMailSuccessAction(){
      include "sendmailthanhcong.php";
    }

    function sendMailFalseAction(){
      include "sendmailthatbai.php";
    }
  }

  