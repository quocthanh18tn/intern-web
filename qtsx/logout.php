<?php session_start(); 
 
if (isset($_SESSION['myusername']))
{
    unset($_SESSION['myusername']); // xóa session login
    echo "<script type='text/javascript'>alert('Successfull Log out');
window.location='../index.php';
</script>";
}
else header('Location: ../index.php');
?>
