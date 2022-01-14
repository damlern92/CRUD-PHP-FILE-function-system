
<?php

$all_users = file("data.txt");// Working with data.txt file
foreach($all_users as $user){// Pass throught the loop users
    
    $user_parsed = explode("|",$user); // Parsing the string
    
    // Extraction of user information:
    $user_id = $user_parsed[0];
    $username = $user_parsed[1];
    $lastname = $user_parsed[2];
    
    // Print user information on the page:
    echo"<a href='details.php?id={$user_id}'><div style ='border:1px solid black; padding:4px;margin:4px;'>";
    echo'First name: '.$username;
    echo'<br>Last name: ' .$lastname;
    echo'</div></a>';
}
?>

<a href="add.php">Add new user</a>