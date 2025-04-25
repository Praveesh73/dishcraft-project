<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: sign in.php');
    exit;
}
if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:sign in page.html');
 }
 
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<div class="container">
    <div class="profile">
        <?php
        $select = mysqli_query($con, "SELECT * FROM `user` WHERE id = '$user_id'") or die('Query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }
            if ($fetch['image']==''){
                echo '<img src= "images/default-avatar.png">';
            }else{
                echo '<img src= "uploaded_img/'.$fetch['image'].'">';
            }
        ?>
        <h2><?php echo $fetch['Username']; ?></h2>
        <p><?php echo $fetch['Email']; ?></p>
        <p><?php echo $fetch['Mobile Number']; ?></p><br>
        <a href= "profile edit.php" class="btn">Edit Profile</a><br><br><br>
        <a href="home.html" class="back-btn"> Go Back</a><br><br><br>
        <a href= "sign in page.html?logout=<?php echo $user_id; ?>" class="delete-btn">Logout</a>
    </div>
</div>
</body>
</html>
