<?php
$conn = mysqli_connect('13.209.116.117', 'root', '1234', 'test',56095);
$sql = "UPDATE `users` SET `verify` = '1' WHERE `users`.`id` = '{$_GET['id']}'";
$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo "verrify fail";
    echo mysqli_error($conn);
} else{
    echo "verrify success";
}
?>
