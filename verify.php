<?php
$conn = mysqli_connect('localhost', 'root', '', 'test');
$sql = "UPDATE `users` SET `verify` = '1' WHERE `users`.`id` = '{$_GET['id']}'";
$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo "verrify fail";
    echo mysqli_error($conn);
} else{
    echo "verrify success";
}
?>
