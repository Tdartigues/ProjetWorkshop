<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<script>
    alert("Vous vous êtes bien déconnecté !");
    window.location = "../PHP/test.php";
</script>


