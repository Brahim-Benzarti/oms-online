<?php 
session_start();
require '../dbcon.php';
$me=$_SESSION['id'];
$to=$_GET['to'];
?>
<link rel="stylesheet" type="text/css" href="../public/stylesheet/stylesheet_messages.css">
<script>
    // changing the text of the submit button
    ref_to_sen=()=>{
        if(document.getElementById('message').value!=''){
            document.getElementById('submit').value="Send";
        }else{
            document.getElementById('submit').value="Refresh";
        }
    }
</script>
<?php 
if(empty($me) || empty($to)){
    header("Location: error.html", TRUE, 301);
    exit();
}else{
    $req="select * from contact where user_id=$me and contact_id=$to union select * from contact where user_id=$to and contact_id=$me;";
    $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
    if(mysqli_num_rows($res)!=2){
        header("Location: error.html", TRUE, 301);
        exit();
    }else{
        ?>
        <?php 
            if(!empty($_POST)){
                $new_message=$_POST['text_message'];
                if(!empty($new_message)){
                    $date=date("Y-m-d h:i:s");
                    $req="INSERT INTO message(Date,text,sender_id,receiver_id)
                            VALUES ('$date','$new_message',$me,$to);";
                    mysqli_query($conn, $req)or die(mysqli_error($conn));
                }
            }
        ?>

        <div class="person">
            <?php
                $req="select User_name from users where User_id=$to;";
                $res=mysqli_query($conn,$req)or die(mysqli_error($conn));
                $f=mysqli_fetch_array($res);
            ?>
            <p><a href="profile.php?id=<?php echo($to);?>" target="_parent"><?php echo($f[0]); ?></a></p>
        </div>

        <div class="messages">
            <?php 
            $req="select User_name,text,date,User_id
                    from message, users
                    where receiver_id=$me and sender_id=$to and user_id=sender_id
                    union 
                    select User_name,text,date,User_id
                    from message, users
                    where receiver_id=$to and sender_id=$me and user_id=sender_id
                    ORDER BY date;";
            $res1=mysqli_query($conn,$req) or die(mysqli_error($conn));
            while($tt=mysqli_fetch_array($res1)){
                ?>
                <div <?php if($tt[3]==$me){echo("class='message_from_me'");}else{echo("class='message_to_me'");};?>class="message">
                <!-- <p><?php echo($tt[0]); ?></p> -->
                <p><?php echo($tt[1]); ?></p>
                <p class="date"><?php echo($tt[2]); ?></p>
                </div>
                <div class="clear"></div> 
                <?php
            }
            ?>
        </div>

        <div id="texting_box"></div>
        <div class="texting_area"  name="f1">
            <form action="#texting_box" method="POST" onsubmit="message_auth();">
                <input type="text" name="text_message" id="message" oninput="ref_to_sen();">
                <input type="submit" value="Refresh" id="submit">
            </form>
        </div>

        <?php
    }
}
?>