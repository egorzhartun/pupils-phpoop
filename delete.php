<?php
    require_once('./includes/load.php');
    if(isset($_GET["id"])) {
        $stateQD = $pupil->delete($_GET["id"]);
        //printf($stateQD);
    } else {
        header("Location: index.php");
    }
?>