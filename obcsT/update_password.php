
<?php session_start(); ?>
<!doctype html>
<html>
<head>
<title>Simple website</title>
<link rel="stylesheet" type="text/css" href="css.css">
<script type="text/javascript" src="js.js"></script>
</head>

<body>
        <h1 align=" left" >  
            <font face="Times New Roman" size="+9" color="#000080">
            NMB TANZANIA 
            </font>
            <img src="logo.jpeg" align="right" height="80" width="10%" class="logo">
        </h1>
      <nav>
          <a href="#" class="navlink"> HOME</a>
          <a href="#" class="navlink" target="blank">ABOUT US</a>
          <a href="#" class="navlink">SERVICE OFFERED</a>
          <a href="#" class="navlink"> CONTACTS US</a>
          <a href="#" class="navlink"> GET HELP</a>
          <a href="admin/" class="navlink"> NOTIFICATION</a>     
      </nav>
      <br>
      <div class="container">
        <div><h3><marquee> Send your feedback</marquee></h3></div>
          
         <div> 
        <?php
         if (isset($_SESSION['confirm_new']))
          {?>
          <h4 style="font-family: serif;color:darkred;">
            <?php echo $_SESSION['confirm_new'];?>
          </h4>
        <?php }

         elseif(isset($_SESSION['correct_password']))
          {?>
          <h4 style="font-family: serif;color:darkred;">
            <?php echo $_SESSION['correct_password'];?>
          </h4>
        <?php }

                 elseif(isset($_SESSION['update_password']))
          {?>
          <h4 style="font-family: serif;color:green;">
            <?php echo $_SESSION['update_password'];?>
          </h4>
        <?php }

                 elseif(isset($_SESSION['update_error']))
          {?>
          <h4 style="font-family: serif;color:darkred;">
            <?php echo $_SESSION['update_error'];?>
          </h4>
        <?php }

         unset($_SESSION['confirm_new']);
         unset($_SESSION['correct_password']);
         unset($_SESSION['update_password']);
         unset($_SESSION['update_error']);
         ;?>

      </div>
        <form action="password_action.php" method="post">
          <div>
            <label>Enter current password</label>
            <input type="password" name="current_password" placeholder="Enter current password" required>
          </div>
          <div>
            <label>Enter new password</label>
            <input type="password" name="new_password" placeholder="Enter new password"required>
          </div>
          <div>
            <label>Confirm new password</label>
            <input type="password" name="confirm_new" placeholder="Confirm new password" required>
          </div>
            <div>
            <button class="sb" type="submit" name="send_data">Update</button>
          </div>
        </form>

</body>
</html>