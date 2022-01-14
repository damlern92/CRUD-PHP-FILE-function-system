<a href="index.php">Return to user list</a><br>

<?php
// If the form is sent, parsing user data and then put that data in the string:
if(isset($_POST['btn_submit'])){
    $users_list = file("data.txt");
    $search_id = $_POST['hf_id'];

    $has_changes = false;

    foreach($users_list as &$usr){// Pass through the array

        $user_row = explode("|", $usr);// Parsing users data
        // Make the string:
        if($search_id == $user_row[0]){
            $tb_user_name = $_POST['tb_username'];
            $tb_last_name = $_POST['tb_lastname'];
            $tb_email = $_POST['tb_email'];
            // Data form put into a new file:
            $user_string = "{$search_id}|{$tb_user_name}|{$tb_last_name}|{$tb_email}";
            $usr = $user_string."\n";// Go through a string and record a file

            $has_changes = true; // if has been a change, the value is true

            break;
        }
    }// End foreach loop 
    
    // recording data into a file:
    if($has_changes){
       $file = fopen("data.txt","w");
       foreach($users_list as $usr1){
           fputs($file, $usr1);//."\n"
       }

       fclose($file);
       header("location: index.php");
    }// End if has_changes
}// End main if 



// Read data from file:
$user_id = isset($_GET['id'])?$_GET['id']:0;
if($user_id<=0){
    die("Invalid user");
}

$file = fopen("data.txt","r");
$user = false;

while(!feof($file)){
    $row = fgets($file);
    $row_arr = explode("|",$row);
    
    $row_user_id = $row_arr[0];
    
    if($row_user_id==$user_id){
        $user = $row_arr;
        break;
    }
    
}// End of while loop

if(!$user){ die("User not found"); } ?>

<form action="" method="post">

<input type="hidden" name="hf_id" value="<?php echo $user[0]; ?>" /><br>
    First name: <input type="text" name="tb_username" value="<?php echo $user[1]; ?>" /><br>
    Last name: <input type="text" name="tb_lastname" value="<?php echo $user[2]; ?>" /><br>
    Email: <input type="text" name="tb_email" value="<?php echo $user[3]; ?>" /><br>
    <input type="submit" name="btn_submit" value="confirm changes" /><br>
</form>