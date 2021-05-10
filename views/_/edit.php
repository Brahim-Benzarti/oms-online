<?php
if(isset($_SESSION['id'])){
    require '../dbcon.php';
    $me=$_SESSION['id'];
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
        $req="UPDATE users SET User_name='$name' WHERE User_id=$me;";
        mysqli_query($conn,$req)or die(mysqli_error($conn));
    }
    if(!empty($_POST['password'])){
        $password=$_POST['password'];
        $req="UPDATE users SET User_password='$password' WHERE User_id=$me;";
        mysqli_query($conn,$req)or die(mysqli_error($conn));
    }
    if(!empty($_POST['pn'])){
        $tel=$_POST['pn'];
        $req="UPDATE users SET User_phone_number='$tel' WHERE User_id=$me;";
        mysqli_query($conn,$req)or die(mysqli_error($conn));
    }
    if(!empty($_POST['description'])){
        $description=$_POST['description'];
        $req="UPDATE users SET User_description='$description' WHERE User_id=$me;";
        mysqli_query($conn,$req)or die(mysqli_error($conn));
    }

    if($_FILES['profile_picture']['name']){
        if($_FILES['profile_picture']['error']){
            $_SESSION['err']="Error, please try again.";
            header("location: edit.php", TRUE,301);
            exit();
        }else{
            $file_name=date('ozGis').'@'.$me.".".strtolower(pathinfo($_FILES['profile_picture']['name'],PATHINFO_EXTENSION));
            if($_FILES['profile_picture']['size'] > 5120000){
                $_SESSION['err']="The picture size exceeded 5M.";
                header("location: edit.php", TRUE,301);
                exit();
            }else{
                $req="UPDATE users SET User_picture='$file_name' WHERE User_id=$me;";
                mysqli_query($conn,$req)or die(mysqli_error($conn));
                if(!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/public/images/users/".$file_name)){
                    $_SESSION['err']="There was a problem uploading the file to Heroku.. Heroku Doesn't support more_uploaded_file().. I nned an AWS account to use S3 bucket instead";
                    header("location: edit.php", TRUE,301);
                    exit();
                }
            }
        }
    }
}else{
    header("location: sign_in.php", TRUE,301);
    exit();
}

?>
