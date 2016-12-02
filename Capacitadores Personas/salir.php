<?php
setcookie("log", "val", time() - (120), "/");
header("Location: index.html");
?>