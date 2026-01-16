<?php
   ini_set('display_errors', 1);
   session_start();

   if (isset($_POST['login'])) {

      if (empty($_POST['username']) || empty($_POST['password'])) {
         echo "<script>alert('Please fill all fields');</script>";
         exit();
      }

      $username = $_POST['username'];
      $password = $_POST['password'];

      $conn = mysqli_connect("localhost", "test", "test", "pizzarestaurant");
      if (!$conn) {
         die("Connection failed");
      }

      // جلب المستخدم
      $query = "SELECT username, password FROM register WHERE username = ? LIMIT 1";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows == 1) {
         $stmt->bind_result($db_username, $db_password);
         $stmt->fetch();

         // التحقق من كلمة المرور
         if (password_verify($password, $db_password)) {
               $_SESSION['username'] = $db_username;
               header("Location: table.php");
               exit();
         } else {
               echo "<script>alert('Username or password is incorrect');</script>";
         }
      } else {
         echo "<script>alert('Username or password is incorrect');</script>";
      }

      $stmt->close();
      mysqli_close($conn);
   }
?>


<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <title>login</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
      <link rel="stylesheet" href="Styles/userStyle.css">
      <script src="https://kit.fontawesome.com/6715d401a1.js" crossorigin="anonymous"></script>
   </head>

   <body>
      <!-- navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"">
         <div class="container-fluid">
            <i class='fas fa-pizza-slice' style='font-size:24px;color:white'></i>
            <input type="button" value="Home" class="btn btn-dark navbar-btn" onclick="home();"> </input>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
               <div class="collapse navbar-collapse" id="navbarCollapse"></div>
         </div>
      </nav>

      <!-- Contact -->
      <div class="w3-container w3-padding-32 w3-light-grey"><br>
         <div class="w3-container w3-padding-64 w3-dark-grey w3-grayscale-min w3-xlarge">
            <div class="w3-content">
               <header>
                  <h1 class="w3-center w3-jumbo" style="margin-bottom:64px" id="Contact"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                  <circle cx="8" cy="8" r="8"/>
                  </svg>Sign-in</h1>
               </header>
            </div>
            <!-- LOGIN -->
            <div id="error" class="form-inner">
               <form action="" method="POST" class="login" name="Log">
                  <div class="field">
                     <input type="text" placeholder="username" required name="username" id="username">
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password" required name="password" id="password">
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login" name="login" id="login" onclick="validateLogin()">
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                  <input type="submit" value="register" name="login" id="login" onclick="showregister()">
               </div>
               </form>  
            </div>

         </div>
      </div>

      <div class="container">
         <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
               <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
               <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
               </a>
               <span class="mb-3 mb-md-0 text-muted fas fa-pizza-slice"> 2022 thin PIZZA</span>
            </div>
         </footer>
      </div>

      <script>
         function home()
         {
            window.location.href = 'Pizza.html';
            return false;
         }

         function showregister()
         {
            window.location.href = 'registerForm.php';
            return false;
         }

         function validateLogin() {
            var x1 = document.forms["Log"]["username"].value;
            var x2 = document.forms["Log"]["password"].value;
            if (x1=="" && x2==""){
               alert("username and password are required");
               return false;
            }else if (x1 == ""){
               alert("username is required");
               return false;
            }else if(x2 == "") { 
               alert("password is required");
               return false;
            }else {
               document.forms.sumbit();
               alert("Loged in succefully");
               return true;
            }
         }
      </script>
   </body>
</html>