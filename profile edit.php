<?php
session_start();
include("db.php");

$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {


    $update_name = mysqli_real_escape_string($con, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($con, $_POST['update_email']);
    $update_number = mysqli_real_escape_string($con, $_POST['update_number']);

    mysqli_query($con, "UPDATE `user` SET `Username` = '$update_name',`Email` ='$update_email' , `Mobile Number` ='$update_number' WHERE id = '$user_id'")
    or die('query failed');

    if (!empty($_POST['update_pass']) || !empty($_POST['new_pass']) || !empty($_POST['confirm_pass'])) {
        $update_pass = mysqli_real_escape_string($con, $_POST['update_pass']);
        $new_pass = mysqli_real_escape_string($con, $_POST['new_pass']);
        $confirm_pass = mysqli_real_escape_string($con, $_POST['confirm_pass']);
        $old_pass = $_POST['old_pass']; // This comes from the hidden field, already contains the current password from DB
    
        if ($update_pass != $old_pass) {
            $message[] = 'Old password not matched!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'Confirm password not matched!';
        } else {
            mysqli_query($con, "UPDATE `user` SET `Password` = '$confirm_pass' WHERE id = '$user_id'") or die('Query failed');
            $message[] = 'Password updated successfully!';
        }
    }
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . $update_image;
    
    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image is too large';
        } else {
            // Make sure the folder exists
            if (!is_dir('uploaded_img')) {
                mkdir('uploaded_img', 0777, true);
            }
    
            $image_update_query = mysqli_query($con, "UPDATE `user` SET `image`='$update_image' WHERE id = '$user_id'") or die('query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'image updated successfully!';
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="update-profile">
    <?php
        $select = mysqli_query($con, "SELECT * FROM `user` WHERE id = '$user_id'") or die('Query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <?php
          if (isset($message)) {
              foreach ($message as $msg) {
                  $msg_class = stripos($msg, 'successfully') !== false ? 'success' : 'error';
                  echo '<div class="message ' . $msg_class . '">' . $msg . '</div>';
              }
          }
          ?>
            <br>
               <?php
                  if ($fetch['image']==''){
                    echo '<img src= "images/default-avatar.png">';
                }else{
                    echo '<img src= "uploaded_img/'.$fetch['image'].'">';
                }
                ?>
            <br>
            <div class="flex">
             
                <div class="inputBox">
                    <span>Username : </span>
                    <input type="text" name="update_name" value="<?php echo $fetch['Username'] ?>" class="box">
                    <span>Your Email : </span>
                    <input type="email" name="update_email" value="<?php echo $fetch['Email'] ?>" class="box">
                    <span>Mobile Number : </span>
                    <input type="number" name="update_number" value="<?php echo $fetch['Mobile Number'] ?>" class="box">
                    <span>Update Your Pic : </span>
                    <input type="file" name="update_image" class="box" accept="images/jpg, images/jpeg, images/png"><br>
                </div>
                <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['Password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box"><br>
            <br><br>
            <input type= "submit" value="update profile" name="update_profile" class ="btn">
            <a href="home.html" class="back-btn"> Go Back</a>
         </div>
         
        </div>
           
        </form>
    </div>


</body>
</html>