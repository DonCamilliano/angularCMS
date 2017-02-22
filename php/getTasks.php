<?php
    require_once 'connect.php';
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_errno!=0) {
    echo 'Error: '.$polaczenie->connect_errno;
} else {
    $data = $polaczenie->query("SELECT * FROM articles ORDER BY id DESC");
    $arr = array();
    if ($data->num_rows > 0) {
        while($wiersz = $data->fetch_assoc()) {
            $arr[] = $wiersz;
        }
    echo $jsonEncode = json_encode($arr);
    $polaczenie->close();
}   
}
?>