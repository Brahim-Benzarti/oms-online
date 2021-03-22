<?php 
session_start();
?>
<!doctype html>
<html>
    <head>
        <?php require './_/head.php' ?>
    </head>

    <body>
        <nav>
            <?php require './_/nav.php' ?>
        </nav>
        <?php 
        if(isset($_SESSION['id'])){
            require '../dbcon.php';
            $me=$_SESSION['id'];
            $to_find=$_POST['search'];
            $req="select User_name,User_id from users where User_name like '%$to_find%';";
            $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
            if(mysqli_num_rows($res)!=0){
                while($t=mysqli_fetch_array($res)){
                    ?>
                    <p><a href="profile.php?id=<?php echo($t[1]);?>"><?php echo($t[0]);?></a></p>
                    <?php
                    }
            }else{
                echo("<p>No Users with such name</p>");
            }
        }else{
            header("Location: sign_in.php", TRUE, 301);
            exit();
        }?>
        <footer>

        </footer>
    </body>
</html>