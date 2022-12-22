
<?php 
session_start();

  $conn = mysqli_connect('localhost', 'root', '', 'nmb');

  $id=$_SESSION['id']['id'];
  $user=$_SESSION['username']['username'];

if(isset($_POST['send_data'])){
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new= $_POST['confirm_new'];

    $current_password=sha1($current_password);
    $new_password=sha1($new_password);
    $confirm_new=sha1($confirm_new);

    if ($new_password!==$confirm_new) {
      $_SESSION['confirm_new']="Password must match";
      header("location:update_password.php");
    }
    else
    {
      
  $select="SELECT  * FROM admin WHERE id='$id' AND password='$current_password'";
  $mysqli=mysqli_query($conn,$select);
  if ($mysqli)
  {
  if(mysqli_num_rows($mysqli)==1)
  {
    $row=mysqli_fetch_array($mysqli);
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];

    if ($current_password!==$_SESSION['password'] AND $_SESSION['username']='$user') {
        $_SESSION['correct_password']="current password is not correct";
        header("location:update_password.php");
      }
      else
      {
        // echo "current_password is correct";

        $update_password="UPDATE admin SET password ='$new_password'
                          WHERE id='$id'";

        $update_query=mysqli_query($conn,$update_password);
        if ($update_query) {
          $_SESSION['update_password']="Password updated successfully";
          header("location:update_password.php");
        }
        else
        {
          $_SESSION['update_error']="failure to update password";
          header("location:update_password.php");
        }
      }
  }}}}







?>
















