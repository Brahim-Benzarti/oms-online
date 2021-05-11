<div class="logo"></div>
<ul>
    <li><a href="account.php">Inbox</a></li>
    <li><a href="friends.php">Friends</a></li>
    <li class="profile"><a href="profile.php"><?php echo($_SESSION['name']); ?></a>
        <ul>
            <li><label for="sign_out" class="sign_out">Sign Out</label></li>
        </ul>
    </li>
</ul>
<?php require 'sign_out.php' ?>