<html>
    <head>
        <title>
            Create Account
        </title>
        <link rel="stylesheet" type="text/css" href="createpage.css">
    </head>
    <body>
      <h1> Create Your Account </h1>
      <div class="container">
          <h2>Create account on www.example.com</h2>
            <div class="wrapper">
              <form method="post" action="">
                <table style="text-align: center;">
                  <tr>
                    <td class="label"><strong>First Name:</strong></td><td>&nbsp&nbsp&nbsp</td>
                    <td><input type="text" name="fname" placeholder="Enter the your first name" required/></td><td><pre>            </pre></td>
                  </tr>
                  <tr/>
                  <tr>
                    <td class="label"><strong>Last Name:</strong></td><td>&nbsp</td>
                    <td><input type="text" name="lname" placeholder="Enter the your last name" required/></td>
                  </tr>
                  <tr/>
                  <tr>
                    <td class="label"><strong>Email id:</strong></td><td>&nbsp</td>
                    <td><input type="text" name="Email" placeholder="Enter the your email id" required/></td>
                  </tr>
                  <tr/>
                  <tr>
                    <td class="label"><strong>Password:</strong></td><td>&nbsp</td>
                    <td><input type="text" name="Password" placeholder="Enter the your password" required/></td>
                  </tr>
                  <tr/>
                  <tr>
                    <td class="label"><strong id="reenter">Re-enter Password:</strong></td><td>&nbsp</td>
                    <td><input type="text" name="rePassword" placeholder="Enter the your password" required/></td>
                  </tr>
                  <tr/>
                </table>
            </br>
            <input type="checkbox" name="privacy" value="1"> I accept the given terms and condition.</input>
            <br/>
            <br/>
          <input type="submit" name="create_account" value="Create Account"/>
          </form>
        </div>
      </div>
    </body>
    <?php
      function exist($str){
        echo "<script type='text/javascript'>
                alert('$str');
                </script>";
      }
    ?>
</html>
<?php
  include('Connection.php');
  if(isset($_POST['create_account'])){

    $fname = mysqli_real_escape_string($conn, htmlspecialchars($_POST['fname']));
    $lname = mysqli_real_escape_string($conn, htmlspecialchars($_POST['lname']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Email']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['Password']));

    if($_POST['Password']!=$_POST['rePassword']){
      exist("Password Mismatch");
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      exist("Invalid email id");
    }
    else if(!isset($_POST['privacy'])){
      exist("Agree terms and conditions.");
    }
    else {
      mysqli_query($conn, "INSERT INTO assign_login(`fname`, `lname`,`email`,`password`) VALUES ('$fname','$lname','$email','$password');")
      or die(mysqli_error());
      header('Location:index.php');
    }
  }
?>
