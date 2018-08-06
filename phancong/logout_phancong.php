<?php
session_start();
if (isset($_SESSION['quanly']))
{
    unset($_SESSION['quanly']); // xóa session login
    echo "<script type='text/javascript'>alert('Successfull Log out');
window.location='../index.php';
</script>";
}
else
    echo "<script type='text/javascript'>;
window.location='../index.php';
</script>";

?>

