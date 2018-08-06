<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
  <title>MMS-HAI NAM AUTOMATION</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<?php session_start();

if (isset($_SESSION['id_tong'])){
    unset($_SESSION['id_tong']); // xóa session login
}

?>
<script type="text/javascript">
    $(document).ready(function(){
   swal({
  title: "Good Bye!",
  text: "You just log out!",
  icon: "success",
})
   .then((willDelete) => {
   window.location='../index.php';
});
});
</script>

