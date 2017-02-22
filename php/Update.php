<?php
    require_once 'connect.php';
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_errno!=0) {
        echo 'Error: '.$polaczenie->connect_errno;
    } else {
        $status = $_GET['status'];
        $taskID = $_GET['taskID'];
        $polaczenie->query("UPDATE tasks SET task='$status' WHERE id='$taskID'") or die($mysqli->error.__LINE__);
        $polaczenie = $mysqli->affected_rows;
        $json_response = json_encode($polaczenie);
        $polaczenie->close();
    }
?>