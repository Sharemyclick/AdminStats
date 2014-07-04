<?php
// On inclut la page de paramètre de connection.
include('conf.php');

// On vérifie que le user est connecté sinon on le renvoie à la page de connection
session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="admin.php"</script>';  
  exit;  
}
?>
    <div class="footer">
    	<div class="footerleft">Sharemyclick v1.0</div>
    	<div class="footerright">&copy; Sharemyclick - <a href="#">Follow us on Twitter</a> - <a href="#">Follow us on Facebook</a></div>
    </div><!--footer-->