<?php
require 'libphp-phpmailer/PHPMailerAutoload.php';
function sendMail($to, $from, $from_name, $subject, $body){
    $mail             = new PHPMailer();

    $mail->IsSMTP();                           // telling the class to use SMTP

    $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                               // 0 = 아무것도 표시하지 않음
                                               // 1 = errors and messages
                                               // 2 = messages only
    $mail->CharSet    = "utf-8";
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier (TLS는 tls 입력)
    $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
    $mail->Port       = 465;                   // set the SMTP port for the GMAIL server (TLS는 587 입력)
    $mail->Username   = "dltmdrb98@gmail.com";            // GMAIL username
    $mail->Password   = "exlobafvsaursjqr";            // GMAIL password

    $mail->SetFrom($from, $from_name);

    $mail->AddReplyTo($from, $from_name);

    $mail->Subject   = $subject;

    $mail->MsgHTML($body);

    $address = $to;
    $mail->AddAddress($address);

    if(!$mail->Send()) {
      //echo "발송 실패: " . $mail->ErrorInfo;
	  return false;
    } else {
      //echo "발송 완료";
	  return true;
    }
}
// error_reporting(-1);
// ini_set('display_errors', 'On');
// set_error_handler("var_dump");

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
$conn = mysqli_connect('13.209.116.117', 'root', '1234', 'test',56095);
echo "conn : ";
if ($conn) echo "success";

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
    https://pc-practice-page-pvfho.run.goorm.io/P4C_practice_page/verify.php?email='.$email.'&id='.$id.'
     
    ';
                         
    $headers = 'From:noreply@p4cprac.com' . "\r\n"; // Set from headers
    if(sendMail($email,'noreply@prc.com','verify' ,$subject, $message)){echo "success email";} // Send our email

    ?>
        <script>
             alert("회원가입이 완료되었습니다. 인증 이메일을 확인해주세요.");
            location.href = "home.php";
        </script>
    <?php
    }

}
?>


