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
            ?>
            <h2>Friends</h2>
            <?php
            $req="select * from contact where user_id=$me;";
            $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
            if(mysqli_num_rows($res)!=0){
                while($t=mysqli_fetch_array($res)){
                    $req="select u.User_name,u.User_id from users as u,contact as c where c.user_id=$t[1] and c.contact_id=$me and u.user_id=c.user_id;";
                    $res2=mysqli_query($conn,$req)or die(mysqli_error($conn));
                    if(mysqli_num_rows($res2)!=0){
                        $x=mysqli_fetch_array($res2);
                        ?>
                            <div class="friends">
                                <p><a href="profile.php?id=<?php echo($x[1]);?>"><?php echo($x[0]);?></a></p>
                            </div>
                        <?php
                    }
                }
            }
            ?>
            <h2>Requested</h2>
            <?php
            $req="select * from contact where user_id=$me;";
            $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
            if(mysqli_num_rows($res)!=0){
                while($t=mysqli_fetch_array($res)){
                    $req="select u.User_name,u.User_id from users as u,contact as c where c.user_id=$t[1] and c.contact_id=$me and u.user_id=c.user_id;";
                    $res2=mysqli_query($conn,$req)or die(mysqli_error($conn));
                    if(mysqli_num_rows($res2)==0){
                        $req="select User_name,User_id from users where User_id=$t[1];";
                        $res3=mysqli_query($conn,$req)or die(mysqli_error($conn));
                        $x=mysqli_fetch_array($res3);
                        ?>
                            <div class="Requested">
                                <p><a href="profile.php?id=<?php echo($x[1]);?>"><?php echo($x[0]);?></a></p>
                            </div>
                        <?php

                    }
                }
            }
            ?>
            <h2>Friend requests</h2>
            <?php
            $req="select * from contact where contact_id=$me;";
            $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
            if(mysqli_num_rows($res)!=0){
                while($t=mysqli_fetch_array($res)){
                    $req="select u.User_name,u.User_id from users as u,contact as c where c.user_id=$me and c.contact_id=$t[0] and u.user_id=c.user_id;";
                    $res2=mysqli_query($conn,$req)or die(mysqli_error($conn));
                    if(mysqli_num_rows($res2)==0){
                        $req="select User_name,User_id from users where User_id=$t[0];";
                        $res3=mysqli_query($conn,$req)or die(mysqli_error($conn));
                        $x=mysqli_fetch_array($res3);
                        ?>
                            <div class="Pending">
                                <p><a href="profile.php?id=<?php echo($x[1]);?>"><?php echo($x[0]);?></a></p>
                            </div>
                        <?php

                    }
                }
            }
        ?>
        <form action="./find.php" method="POST">
            <h2>Add Friends</h2>
            <label for="search">Search: </label>
            <input type="text" name="search" id="search" required>
            <input type="submit" value="Search">
        </form>
        <?php
        }else{
            header("Location: sign_in.php", TRUE, 301);
            exit();
        }?>

        <footer>

        </footer>
    </body>
</html>

