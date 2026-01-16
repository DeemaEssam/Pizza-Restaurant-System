<?php
ini_set('display_errors', 1); 
session_start();

// التحقق من تسجيل الدخول
if (!isset($_SESSION['username'])) {
    header("Location: loginForm.php");
    exit();
}

if(isset($_POST["update"])) {

    $message = $_POST['message'];
    $rating = $_POST['rating'];
    $username = $_SESSION['username'];

    $link = mysqli_connect("localhost","test","test","pizzarestaurant");
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // تحديث الرسالة والتقييم في نفس الوقت باستخدام Prepared Statement
    $stmt = $link->prepare("UPDATE contact SET message=?, rating=? WHERE username=?");
    $stmt->bind_param("sis", $message, $rating, $username); // s = string, i = integer, s = string

    if ($stmt->execute()) {
        header("Location: table.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
        header("Location: Edit.php");
        exit();
    }

    $stmt->close();
    mysqli_close($link);
}
?>



<html>
    <head>
        <title>Update</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
        <!-- external css -->
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
        </nav>

        <!-- Contact -->
        <div class="w3-container w3-padding-32 w3-light-grey"><br>
            <div class="w3-container w3-padding-64 w3-dark-grey w3-grayscale-min w3-xlarge">
                <div class="w3-content">
                    <header>
                        <h1 class="w3-center w3-jumbo" style="margin-bottom:64px" id="Contact"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                        </svg>EDIT</h1>
                    </header>

                    <p class = "w3-center" >Edit your message</p>
                    <div class="form-inner">
                        <form action="" method="POST" name="edit">
                            <div class="field">
                                <input type="text" required name="message" placeholder="message">
                            </div>

                            <div class="field">
                                <input type="number" required name="rating" placeholder="rating">
                            </div>
                            <div class="field btn">
                                <div class="btn-layer"></div>
                                <input type="submit" value="Update" class="btn" name="update" id="update" onclick="validateEdit();">
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
            function showOtable()
            {
                window.location.href = 'table.php';
                return false;
            }
            function home()
            {
                window.location.href = 'pizza.html';
                return false;
            }
            function validateEdit() {
               var x1= document.forms["edit"]["message"].value;
               if (x1=="" && x2==""){
                  alert("message and password are required");
                  return false;
               }else if (x1 == ""){
                  alert("message is required");
                  return false;
               }
            }
            function validatewrong() {
                  alert("password is incorrect");
                  return false;
            }
        </script>
    </body>
</html>