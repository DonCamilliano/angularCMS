<?php
    require_once 'connect.php';
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_errno!=0) {
        echo 'Error: '.$polaczenie->connect_errno;
    } else {
        $task = $_GET['text'];
        $status = "0";
        $polaczenie->query("INSERT INTO tasks(task, status) VALUES ('$task', '$status')") or die($mysqli->error.__LINE__);
        $polaczenie = $mysqli->affected_rows;
        echo $json_response = json_encode($polaczenie);
        $polaczenie->close();
    }
?>