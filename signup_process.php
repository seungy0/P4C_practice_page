<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($id) ||empty($username) ||empty($email) ||empty($password)){
?>
    <script>
        alert("빈칸이 있습니다.");
        location.href = "signup.php";
    </script>
<?php
}else{
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
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    ?>
        <script>
            alert("이메일이 유효하지 않습니다.");
            location.href = "signup.php";
        </script>
    <?php
    }else{
    $subject = 'P4c practice id verification'; // Give the email a subject 
    $message = '
    
    Please click this link to activate your account:
    localhost/P4C_practice_page/verify.php?email='.$email.'&id='.$id.'
     
    ';
                         
    $headers = 'From:noreply@p4cprac.com' . "\r\n"; // Set from headers
    if(mail($email, $subject, $message, $headers)){echo "success email";} // Send our email

    ?>
        <script>
             alert("회원가입이 완료되었습니다. 인증 이메일을 확인해주세요.");
            // location.href = "home.html";
        </script>
    <?php
    }

}
?>


