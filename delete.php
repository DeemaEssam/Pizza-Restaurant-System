<?php
    // تشغيل الجلسة في أعلى الصفحة
    session_start();

    // التحقق من تسجيل الدخول
    if (!isset($_SESSION['username'])) {
        header("Location: loginForm.php");
        exit();
    }

    ini_set('display_errors', 1);

    if(isset($_GET["username"]))
    {
       echo "session started"; 
        $link = mysqli_connect("localhost","test","test") or die(mysqli_error($link));
        mysqli_select_db($link, "pizzarestaurant") or die(mysqli_error($link));
        mysqli_query($link, "DELETE FROM contact WHERE username='$_GET[username]'");
    } else{
        echo"error";
    }
?>
<script>
    window.location="table.php";
</script>