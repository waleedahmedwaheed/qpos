<?php  
session_start();
unset($_SESSION['name']);
session_write_close(); 
echo '<script> document.location = "login.php"; </script>'; 
?>

