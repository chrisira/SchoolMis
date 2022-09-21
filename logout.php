<?php
session_start();
session_destroy();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
echo "<script>alert('logout successful');document.location='auth/login.php'</script>";

?>