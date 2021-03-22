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
        ?>
        
        <div class="main">
            <div class="people">
                <?php 
                $req="select User_name,User_id from message,users where receiver_id='$me' and sender_id=User_id group by sender_id;";
                $res=mysqli_query($conn,$req) or die(mysqli_error($conn));
                if(mysqli_num_rows($res)==0){

                }else{
                    while($t=mysqli_fetch_array($res)){
                        ?>
                        <div class="person" id="<?php echo($t[1]);?>">
                            <a href="./messaging.php?to=<?php echo($t[1]);?>#texting_box" target="messaging_box" onclick="talking_with('<?php echo($t[1]);?>');"><?php echo($t[0]);?></a>
                        </div>
                        <?php
                    }
                }?>
            </div>
            <div class="message_box">
                <iframe src="<?php if(isset($_GET['message'])){echo('./messaging.php?to='.$_GET['message'].'#texting_box');} ?>" frameborder="0" name="messaging_box"></iframe>
            </div>
        </div>
        
        <?php
        }else{
            header("Location: sign_in.php", TRUE, 301);
            exit();
        }?>

        <footer>

        </footer>
    </body>
</html>
