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
        <div class="clear"></div>
        <?php 
        if(isset($_SESSION['id'])){
            require '../dbcon.php';
            $me=$_SESSION['id'];
            $req="SELECT * FROM users WHERE User_id=$me;";
            $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
            $info=mysqli_fetch_array($res);
        ?>
        <!-- content goes here -->
        <?php if(empty($_POST['edit'])){ ?>
            <div class="main">
                <div class="profile_picture_container">
                <label for="profile_picture">
                    <div class="profile_picture" <?php if($info['User_picture']<>''){ ?>style="background-image: url(<?php echo('../public/images/users/'.$info['User_picture']); ?>);" <?php }; ?>><div class="profile_picture_change_effect"></div></div>
                    
                </label>
                </div>
                <div class="signing_container">
                <form action="" method="POST" onsubmit="verify_sign_up_info();" enctype="multipart/form-data">
                    <input class="hidden" type="file" name="profile_picture" id="profile_picture" accept="image/png, image/jpeg, image/jpg">
                    <div class="info sign_up">
                        <div class="labels">
                            <label for="name">Name:</label>
                            <label for="password">Password:</label>
                            <label for="pn">Phone number:</label>
                            <label for="description">Description:</label>
                        </div>
                        <div class="inputs">
                            <input type="text" id="name" name="name" placeholder="<?php echo($info[1]); ?>">
                            <input type="password" id="password" name="password">
                            <input type="tel" id="pn" pattern="[0-9]{2}[0-9]{3}[0-9]{3}" name="pn" placeholder="<?php echo($info[4]); ?>">
                            <input type="text" id="description" name="description" placeholder="<?php echo($info[7]); ?>">
                        </div>
                    </div>
                    <div class="clear_only"></div>
                    <div class="choice">
                        <p class="error_message"><?php if(!empty($_SESSION['err'])){echo($_SESSION['err']);session_unset();}?></p>
                        <div>
                            <input id="button" type="submit" value="Confirm" name="edit">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        <?php
            }else{
                require './_/edit.php';
                header('location: profile.php', TRUE, 301);
                exit();
            }
        }else{
            header("Location: sign_in.php", TRUE, 301);
            exit();
        }?>

        <footer>

        </footer>
    </body>
</html>