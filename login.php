<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    .myForm {
      min-width: 400px;
      position: absolute;
      text-align: left;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 2.5rem;


    }
    @media (max-width: 600px) {
      .myForm {
        min-width: 90%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    require("dbconnection.php");

    if (isset($_POST["btnlogin"])) {
      $db=new dbconnection();
      $uname=$_POST["email"];
      $pass=$_POST["password"];

      $qry="select * from user where uname='$uname' and password='$pass'";
      $rs=$db->QueryTable($qry);
      if (mysqli_num_rows($rs)>0) {
       echo "yes";
      }else {
       echo "string";
      }


    }
    ?>

    <form class="myForm" action="login.php" method="post">
      <div class="form-group ">
        <label for="email">Email</label>
        <input class="form-control input-lg" type="text" name="email" id="email" placeholder="email" />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control input-lg" type="password" name="password" placeholder="password" />
      </div>
      <div class="form-group">
        <input type="submit" name="btnlogin" class="btn btn-success btn-lg" value="Log In" />
      </div>
    </form>
  </div>

</body>
</html>
