<?php
	$user_id = $_GET['del'];
	
	$users = file('data.txt');
	foreach($users as $user){
    $user_parsed = explode("|",$user); // Parsing the string
    
    // Extraction of user information:
    $row_user_id = $user_parsed[0];
    $username = $user_parsed[1];
    $lastname = $user_parsed[2];
    $email = $user_parsed[3];

    if($row_user_id==$user_id){ // row_user_id match with $user_id
        $user_string = "{$row_user_id}|{$username}|{$lastname}|{$email}";	
    	$content = str_replace($user_string, '', $users);
		file_put_contents('data.txt', $content);
		
		header("location: index.php");
    }

}