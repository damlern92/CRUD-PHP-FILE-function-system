<?php

if(isset($_POST['btn_submit'])){
    
    $all_users = file("data.txt");
    $last_user = $all_users[sizeof($all_users)-1]; // Taking the last member of the series
    $user = explode("|", $last_user);

    // Structure for the new user:
    $new_user = ($user[0]+1)."|".$_POST['tb_username']."|".$_POST['tb_lastname']."|".$_POST['tb_email']."\n";

    file_put_contents("data.txt", $new_user, FILE_APPEND); // Adding users to a new line
    
    header("Location: index.php");
}
?>

<form action="" method="post">
    First name: <input type="text" name="tb_username" value="" /><br>
    Last name: <input type="text" name="tb_lastname" value="" /><br>
    Email: <input type="text" name="tb_email" value="" /><br>
    <input type="submit" name="btn_submit" value="confirm changes" /><br>
</form>

<a href="index.php">Back to the user list</a><br>