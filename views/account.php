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
                $req="select User_name,User_id,User_picture,User_status from message,users where receiver_id='$me' and sender_id=User_id group by sender_id;";
                $res=mysqli_query($conn,$req) or die(mysqli_error($conn));
                if(mysqli_num_rows($res)!=0){
                    while($t=mysqli_fetch_array($res)){
                        ?>
                        <div class="person initial" id="<?php echo($t[1]);?>">
                            <div class="profile_picture_container_inbox">
                                <div class="profile_picture_inbox" <?php if($t[2]<>''){ ?>style="background-image: url(<?php echo('../public/images/users/'.$t[2]); ?>);" <?php }; ?>></div>
                                <div class="clear_only"></div>
                                <div class="status <?php if($t[3]){echo('connected');}; ?>"></div>
                                <?php
                                    $req="select Message_id
                                    from message, users
                                    where receiver_id=$me and sender_id=$t[1] and user_id=sender_id and seen=0;";
                                    $res2=mysqli_query($conn,$req);
                                    if(mysqli_num_rows($res2)!=0){
                                        ?>
                                        <div class="not_seen">
                                        <?php
                                        echo(mysqli_num_rows($res2));
                                        ?>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="text_beside_picture">
                                <a href="./messaging.php?to=<?php echo($t[1]);?>#texting_box" target="messaging_box" onclick="talking_with('<?php echo($t[1]);?>');change_picture();"><?php echo($t[0]);?></a>
                            </div>
                        </div>
                        <div class="clear_only"></div>
                        <?php
                    }
                }
                ?>
                <div class="person initial">
                    <div class="profile_picture_container_inbox">
                        <div class="profile_picture_inbox" style="background-image: url('../public/images/plus.png');"></div>
                    </div>
                    <div class="text_beside_picture">
                        <a href="#" onclick="new_message();">New message</a>
                    </div>
                </div>
                <div class="new_message hidden">
                    <div>
                        <input class="search" type="text" name="search" id="" placeholder="Filter" oninput="filter();">
                        <?php
                        $req="select * from contact where user_id=$me;";
                        $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
                        if(mysqli_num_rows($res)!=0){
                            while($t=mysqli_fetch_array($res)){
                                $req="select u.User_name,u.User_id,u.User_picture from users as u,contact as c where c.user_id=$t[1] and c.contact_id=$me and u.user_id=c.user_id;";
                                $res2=mysqli_query($conn,$req)or die(mysqli_error($conn));
                                if(mysqli_num_rows($res2)!=0){
                                    $x=mysqli_fetch_array($res2);
                                    ?>
                                        <div class="person filtering" id="<?php echo($x[1]);?>" name="<?php echo($x[0]);?>">
                                            <div class="profile_picture_container_inbox">
                                                <div class="profile_picture_inbox" <?php if($x[2]<>''){ ?>style="background-image: url(<?php echo('../public/images/users/'.$x[2]); ?>);" <?php }; ?>></div>
                                            </div>
                                            <div class="text_beside_picture">
                                                <a class="filter" href="./messaging.php?to=<?php echo($x[1]);?>#texting_box" target="messaging_box" onclick="talking_with('<?php echo($x[1]);?>');change_picture();"><?php echo($x[0]);?></a>
                                            </div>
                                        </div>
                                        <div class="clear_only"></div>
                                    <?php
                                }
                            }
                        }
                        ?>
                        <div class="person" id="default">
                            <div class="profile_picture_container_inbox">
                                <div class="profile_picture_inbox" style="background-image: url('../public/images/plus.png');"></div>
                            </div>
                            <div class="text_beside_picture">
                                <a href="./friends.php" onclick="talking_with('default');" onclick="change_picture();">Add friends</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="./account.php" class="back_to_inbox hidden"></a>
            </div>
            <div class="message_box">
                <iframe id="iframe_box" src="<?php if(isset($_GET['message'])){echo('./messaging.php?to='.$_GET['message'].'#texting_box');} ?>" frameborder="0" name="messaging_box"></iframe>
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

