<?php
    ini_set('display_errors', 1);
    session_start();
  // تشغيل الجلسة في أعلى الصفحة
  session_start();

  // التحقق من تسجيل الدخول
  if (!isset($_SESSION['username'])) {
      header("Location: login.php");
      exit();
  }
    $error = '';

    if (isset($_POST['send'])){
        if(empty($_POST['message']) OR empty($_POST['rating'])){
            echo"Fill all the blanks";
        }else{
            $username = $_SESSION['username'];
            $message = $_POST['message'];
            $rating = $_POST['rating'];

            $conn = mysqli_connect("localhost", "test", "test", "pizzarestaurant");

            $query = "SELECT username from register where username=? limit 1";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($username);
            $stmt->store_result();

            if($stmt->fetch()){
                $_SESSION['username'] = $username;
                // database insert SQL code
                $sql = "INSERT INTO `contact` (`username`, `message`, `rating`) VALUES ('$username', '$message', '$rating')";
                // insert in database 
                $rs = mysqli_query($conn, $sql);
                header("location: table.php");
            }else {
                echo"username is NOT found";
                }
            mysqli_close($conn);
        }
    }
?> 

<html>
    <head>
        <title>Contact</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
        <link rel="stylesheet" href="Styles/msgStyle.css">
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
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </li>
                </ul>
            </div>
        </nav>

        <!-- Contact -->
        <div class="w3-container w3-padding-32 w3-light-grey"><br>
            <div class="w3-container w3-padding-64 w3-dark-grey w3-grayscale-min w3-xlarge">
                <div class="w3-content">
                    <header>
                        <h3 class="w3-center w3-jumbo" style="margin-bottom:64px" id="Contact"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                        </svg>CONTACT</h3>
                    </header>
                    <p class="w3-xxlarge"><strong>Share</strong> your experiences, offer a suggestion, or enquire:
                    </p>
                    
                    <div class="form-inner">
                        <form action="message.php" method="POST" name="Msg">
                            <div class="field">
                                <input type="text" placeholder="message" required name="message">
                            </div>
                            <div class="field">
                                <input type="number" placeholder="rating" required name="rating">
                            </div>
                            <div class="field btn">
                                <div class="btn-layer"></div>
                                <input type="submit" value="send message" name="send" onclick="validateMsg();">
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
        </div>

        <script>
            function home()
            {
                window.location.href = 'Pizza.html';
                return false;
            }

            function validateMsg() {
               var x2= document.forms["Msg"]["message"].value;
            if(x2 == "") { 
                  alert("Message is required");
                  return false;
               }else {
                  document.forms.sumbit();
                  window.location.href = 'table.php';
                  alert("sent in succefully");
                  return true;
               }
            }
            </script>
    </body>
</html>