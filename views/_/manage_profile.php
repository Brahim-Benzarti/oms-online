<?php
    session_start();
    if(!empty($_SESSION['id'])){
        require '../../dbcon.php';
        $me=$_SESSION['id'];
        if(!empty($_SESSION['to_unfriend'])){
            echo("<script>alert('to_unfriend');</script>");
            $person=$_SESSION['to_unfriend'];
            $_SESSION['to_unfriend']='';
            $req="DELETE FROM contact WHERE user_id=$me AND contact_id=$person;";
            $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
            $req="DELETE FROM contact WHERE user_id =$person AND contact_id=$me;";
            $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
        }elseif(!empty($_SESSION['to_delete'])){
            echo("<script>alert('to_delete');</script>");
            $person=$_SESSION['to_delete'];
            $_SESSION['to_delete']='';
            $req="DELETE FROM contact WHERE user_id=$me AND contact_id=$person;";
            $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
        }elseif(!empty($_SESSION['to_accept'])){
            echo("<script>alert('to_accept');</script>");
            $person=$_SESSION['to_accept'];
            $_SESSION['to_accept']='';
            $req="insert into contact values($me,$person)";
            $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
        }elseif(!empty($_SESSION['to_request'])){
            echo("<script>alert('to_request');</script>");
            $person=$_SESSION['to_request'];
            $_SESSION['to_request']='';
            $req="insert into contact values($me,$person)";
            $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
        }
        header("Location: ../profile.php?id=$person", TRUE, 301);
        exit();
    }
?>