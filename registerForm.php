<?php
    
   ini_set('display_errors', 1); 

   if (isset($_POST['signup'])) {
      // بدء الجلسة
      session_start();

      // الاتصال بقاعدة البيانات
      $con = mysqli_connect('localhost', 'test', 'test', 'pizzarestaurant');
      
      if (!$con) {
         die("Connection failed: " . mysqli_connect_error());
      }

      // جلب البيانات من الفورم
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      // **تشفير كلمة المرور قبل التخزين**
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // تحقق إذا كان username أو email موجود بالفعل
      $check_sql = "SELECT * FROM register WHERE username='$username' OR email='$email'";
      $check_rs = mysqli_query($con, $check_sql);

      if (mysqli_num_rows($check_rs) > 0) {
         echo "<script>alert('Username or Email already used');</script>";
      } else {
         // إدخال البيانات في قاعدة البيانات
         $sql = "INSERT INTO `register` (`username`, `email`, `password`) 
                  VALUES ('$username', '$email', '$hashed_password')";
         
         if (mysqli_query($con, $sql)) {
               // **بدء الجلسة وتعيين متغيرات الجلسة**
               $_SESSION['username'] = $username;
               $_SESSION['email'] = $email;

               mysqli_close($con);
               header("Location: table.php");
               exit();
         } else {
               echo "<script>alert('Error: Could not register user');</script>";
         }
      }

      mysqli_close($con);
   }
?>


<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <title>register/login</title>
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
                  </svg>Sign-up</h1>
               </header>
               </div>
                     <div id="error" class="form-inner">
                        <form action="" method="POST" class="signup" name="Reg">
                           <div class="field">
                              <input type="text" placeholder="username" required name="username" id="username">
                              <div class="error"></div>
                           </div>
                           <!-- REGISTER -->
                           <div class="mail field">
                              <input type="email" placeholder="email address" required name="email" id="email">
                              <div class="error"></div>
                           </div>
                           <div class="field">
                              <input type="password" placeholder="password" required name="password" id="password">
                              <div class="error"></div>
                           </div>
                           <div class="field btn">
                              <div class="btn-layer"></div>
                                 <input type="submit" value="Signup" name="signup" id="Signup" onclick="validateRegister();ValidateEmail(document.Reg.email)">
                              </div>
                           <div class="field btn">
                              <div class="btn-layer"></div>
                                 <input type="submit" value="login to an existing account" name="login" id="login" onclick="showLogin()">
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script>
         function home()
         {
            window.location.href = 'Pizza.html';
            return false;
         }

         function showLogin()
         {
            window.location.href = 'loginForm.php';
            return false;
         }

         function ValidateEmail(inputText)
         {
            var mailformat = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
            if (inputText.value.match(mailformat))
            {
               document.reg.sumbit();
               return true;
            } else
            {
               alert("email must be like(example@example.com)");
               return false;
            }
         }

         function validateRegister(inputText) {
            var x1 = document.forms["Reg"]["username"].value;
            var x2 = document.forms["Reg"]["email"].value;
            var x3 = document.forms["Reg"]["password"].value;
            if (x1=="" && x2=="" && x3==""){
               alert("username, password and email are required");
               return false;
            }else if (x1=="" && x2==""){
               alert("username and email are required");
               return false;
            }else if (x2=="" && x3==""){
               alert("password and email are required");
               return false;
            }else if (x1=="" && x3==""){
               alert("username and password are required");
               return false;
            }else if (x1 == ""){
               alert("username is required");
               return false;
            }else if(x2 == "") { 
               alert("email is required");
               return false;
            }else if(x3 == "") { 
               alert("password is required");
               return false;
            }else {
               document.forms.sumbit();
               alert("registered");
               return true;
            }
         }
      </script>
   </body>
</html>