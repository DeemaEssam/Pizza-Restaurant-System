<?php
  session_start();

  // التحقق من تسجيل الدخول
  if (!isset($_SESSION['username'])) {
      // header("Location: loginForm.php");
      // exit();
      // لان حتى لو اليوزر مو داخل عادي يقدر يقرا تعليقات الناس بس مايقدر يكتب الا اذا دخل
  }
  ini_set('display_errors', 1);

  $connection = mysqli_connect("localhost", "test", "test");
  $db = mysqli_select_db($connection, 'pizzarestaurant');

  $sql = "SELECT * FROM contact";
  $result = mysqli_query($connection, $sql);
?>

<html>
  <head>
      <title>Messages</title>
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
        <span class="navbar-toggler-icon"></span></button>
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

    <br>
<center>
    <div class="w3-container w3-padding-32 w3-light-grey"><br>
      <div class="w3-container w3-padding-64 w3-dark-grey w3-grayscale-min w3-xlarge">
          <div class="container">
            <header>
              <div class="row justify-content-center">
                <div class="text-center">
                  <i><strong>
                    Here you can read people's opinions, suggestions or share yours!.
                  </i></strong><br><br>
                </div>
              </div>
            </header>
          </div>

          <div class="bd-example">
            <table class="table table-striped table-hover justify-content-center" border="4">
              <thead>
                <tr>
                <?php
                if (isset($_SESSION['username']))
                {
                    $mysqli = new mysqli("localhost", "test", "test", "pizzarestaurant");

                    $result2 = $mysqli->query("SELECT userType FROM register WHERE userType=1 AND username='$_SESSION[username]'");
                    if ($result2->num_rows == 1) 
                        {?>
                          <th class="table-light text-center" scope="col">DELETE</th>
                          <th class="table-light text-center" scope="col">USERNAME</th>
                          <th class="table-light text-center" scope="col">MESSAGE</th>
                          <th class="table-light text-center" scope="col">RATING</th>
                  <?php }else
                        { ?>
                          <th class="table-light text-center" scope="col">USERNAME</th>
                          <th class="table-light text-center" scope="col">MESSAGE</th>
                          <th class="table-light text-center" scope="col">RATING</th>
                  <?php } ?>
                  <?php
                } else
                      { ?>
                        <th class="table-light text-center" scope="col">USERNAME</th>
                        <th class="table-light text-center" scope="col">MESSAGE</th>
                        <th class="table-light text-center" scope="col">RATING</th>
                <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $i = 0;
                  while($rows = mysqli_fetch_assoc($result)){
                  $i++;
                ?>
                <tr>
                <?php
                if (isset($_SESSION['username']))
                {
                    $mysqli = new mysqli("localhost", "test", "test", "pizzarestaurant");
                    $result2 = $mysqli->query("SELECT userType FROM register WHERE userType=1 AND username='$_SESSION[username]'");
                    if ($result2->num_rows == 1) 
                      {?>
                        <td class="table-light text-center" scope="col"><a href="delete.php?username=<?php echo $rows['username']; ?>"><button type="submit" class="btn btn-danger" name="delete" id="delete">Delete</button></a></td>
                        <td class="table-light text-center" scope="col-6"><?php echo $rows['username']; ?></td>
                        <td class="table-light text-justify" scope="col-6"><?php echo $rows['message']; ?></td>
                        <td class="table-light text-justify" scope="col-6"><?php echo $rows['rating']; ?></td>
                        <?php 
                      } else 
                      {?>
                        <td class="table-light text-center" scope="col-6"><?php echo $rows['username']; ?></td>
                        <td class="table-light text-justify" scope="col-6"><?php echo $rows['message']; ?></td>
                        <td class="table-light text-justify" scope="col-6"><?php echo $rows['rating']; ?></td>
                    <?php } ?>
                  <?php 
                }else
                    { ?>
                      <td class="table-light text-center" scope="col-6"><?php echo $rows['username']; ?></td>
                      <td class="table-light text-justify" scope="col-6"><?php echo $rows['message']; ?></td>
                      <td class="table-light text-justify" scope="col-6"><?php echo $rows['rating']; 
                    }?></td>


                  <?php } ?>
                </tr>
              </tbody>
            </table>
          </div>

          <?php
          if (isset($_SESSION['username']))
          {
              $mysqli = new mysqli("localhost", "test", "test", "pizzarestaurant");

              $result3 = $mysqli->query(" SELECT message, username
                                          FROM contact
                                          WHERE username IN (
                                          SELECT username
                                          FROM register
                                          WHERE username = '$_SESSION[username]')");
              if ($result3->num_rows == 1) {
            ?>
              <div class="form-inner">
              <form action="edit.php" method="POST">
                  <div class="field btn">
                      <div class="btn-layer"></div>
                      <input type="submit" value="Edit your message" name="edit" onclick="showEdit();">
                  </div>
              </form>
            </div>
            <?php }else{ ?>
              <div class="form-inner">
              <form action="message.php" method="POST">
                  <div class="field btn">
                      <div class="btn-layer"></div>
                      <input type="submit" value="Add a message" name="add" id="add" onclick="showContact();">
                  </div>
              </form>
            </div>
            <?php } ?>
          
          
            <?php }else if (!isset($_SESSION['username'])){?>
            <div class="form-inner">
              <form action="loginForm.php" method="POST">
                  <div class="field btn">
                      <div class="btn-layer"></div>
                      <input type="submit" value="Login to add a message" name="log" id="log" onclick="showLogin();">
                  </div>
              </form>
            </div>
          <?php } ?>


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
</center>
    <script>
      function home()
      {
        window.location.href = 'Pizza.html';
        return false;
      }

      function showUser()
      {
        window.location.href = 'user.html';
        return false;
      }
      function showContact()
      {
        window.location.href = 'contact.html';
        return false;
      }
      function showEdit()
      {
        window.location.href = 'edit.php';
        return false;
      }

      function showLogin()
      {
          window.location.href = 'loginForm.php';
          return false;
      }
    </script>
  </body>

</html>
