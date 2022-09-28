<?php
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = mysqli_connect('localhost', 'root', '', 'test');
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo $hashedPassword;
$sql = "
    INSERT INTO users(id, username, password, email)
    VALUES('{$id}', '{$username}', '{$hashedPassword}', '{$email}')";
echo $sql;
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "add record fail";
    echo mysqli_error($conn);
} else {
?>
    <script>
        alert("회원가입이 완료되었습니다. 인증 이메일을 확인해주세요.");
        location.href = "home.html";
    </script>
<?php
}
?>
