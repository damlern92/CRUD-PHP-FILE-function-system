<?php

$user_id = isset($_GET['id'])?$_GET['id']:0;// The Parameter from the index.php page
if($user_id<=0){ 
	die("Invalid user"); 
}
$file = fopen("data.txt","r");

$user = false;// User identification 

// Pares the string and take the id: ===============
while(!feof($file)){
    $row = fgets($file);// Reading one line from the file
    $row_arr = explode("|",$row);
    $row_user_id = $row_arr[0];
    
    if($row_user_id==$user_id){ // row_user_id match with $user_id
        $user = $row_arr;
        break;
    }
    
} // End while loop

// ==================================================

if(!$user){ die("Users not found <a href=\"./\">Back to the user list</a>"); }
?>

<h3>User data</h3>
<div>Name: <?php echo $user[1];?></div>
<div>Last name: <?php echo $user[2];?></div>
<div>Email: <?php echo $user[3];?></div>
<a href="update.php?id=<?php echo $user[0];?>">Edit</a>
<a onclick="return confirm('Are you sure to delete this user')" href="delete.php?del=<?php echo $user[0];?>">Delete</a>
<br><br>
<a href="./">Back to the user list</a>