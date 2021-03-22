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
            if(!empty($_GET['id']) && $_GET['id']!=$_SESSION['id']){
                $person=$_GET['id'];
                $me=$_SESSION['id'];
            }else{
                $person=$_SESSION['id'];
            };
            require '../dbcon.php';
            $req="select * from users where User_id=$person;";
            $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
            $t=mysqli_fetch_array($res);
            ?>
            <h1><?php echo($t['User_name']); ?></h1>
            <h2>About: </h2>
            <p>Email adress: <?php echo($t['User_email']); ?></p>
            <p>Birthday: <?php echo($t['User_birthday']); ?></p>
            <?php if(!empty($t['User_phone_number'])){echo('<p>Phone number: '.$t['User_phone_number'].'</p>');}; ?>
            <?php if(!empty($t['User_sex'])){echo('<p>Sex: '.$t['User_sex'].'</p>');}; ?>
            <?php if(!empty($t['User_description'])){echo('<p>Description: '.$t['User_description'].'</p>');}; ?>
            <?php
            if(isset($me)){?>
                <div class="profile_status">
                <form action="./_/manage_profile.php" method="POST">
                <h2>Status: </h2>
                <?php
                    $next=1;
                    $req="select * from contact where user_id=$me;";
                    $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
                    if(mysqli_num_rows($res)!=0){
                        while($t=mysqli_fetch_array($res)){
                            $req="select u.User_name,u.User_id from users as u,contact as c where c.user_id=$t[1] and c.contact_id=$me and u.user_id=c.user_id;";
                            $res2=mysqli_query($conn,$req)or die(mysqli_error($conn));
                            if(mysqli_num_rows($res2)!=0){
                                $x=mysqli_fetch_array($res2);
                                if($x[1]==intval($person)){
                                    $_SESSION['to_unfriend']=$x[1];
                                    ?> 
                                        <p>Friends</p>
                                        <a href="./account.php?message=<?php echo($x[1]); ?>">Message</a>
                                        <input type="submit" value="Unfriend" >
                                    </form>
                                    <?php
                                    $next=0;
                                    break;
                                }
                            }
                        }
                    }
                    if($next){
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
                                    if($x[1]==intval($person)){
                                        $_SESSION['to_unfriend']=null;
                                        $_SESSION['to_delete']=$x[1];
                                        ?> 
                                            <p>Friend request sent</p>
                                            <input type="submit" value="Delete">
                                        </form>
                                        <?php
                                        $next=0;
                                        break;
                                    }
                                }
                            }
                        }
                    }                 
                    if($next){
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
                                    if($x[1]==intval($person)){
                                        $_SESSION['to_unfriend']=null;
                                        $_SESSION['to_delete']=null;
                                        $_SESSION['to_accept']=$x[1];
                                        ?> 
                                            <p>Pending friendship</p>
                                            <input type="submit" value="Accept" >
                                        </form>
                                        <?php
                                        $next=0;
                                        break;
                                    }
                                }
                            }
                        }
                   }
                   if($next){
                        $_SESSION['to_unfriend']=null;
                        $_SESSION['to_delete']=null;
                        $_SESSION['to_accept']=null;
                        $_SESSION['to_request']=$person;
                        ?>
                        <p>Possible friendship</p>
                        <input type="submit" value="Request" >
                        </form>
                        <?php
                   }
                ?>
                </div>
            <?php } ?>
        <?php
        }else{
            header("Location: sign_in.php", TRUE, 301);
            exit();
        }?>
        <footer>

        </footer>
    </body>
</html>