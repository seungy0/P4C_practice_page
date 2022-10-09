<?php 
  include 'session_head.php';
  require 'pw.php';
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>
    <?php
      if ( $jb_login ) {
        echo '<h1>이미 로그인하셨습니다.</h1>';
      } else {
        $conn = mysqli_connect('13.209.116.117', 'root', $dbpw, 'test',56095);
        $id = $_POST[ 'id' ];
        $password = $_POST[ 'password' ];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM users WHERE id = '$id' AND password = '$hashedPassword'";
        $result = mysqli_query($conn, $sql);
        if ( $result ) {
          $_SESSION[ 'id' ] = $id;
    ?>
          <script>
              alert("로그인 성공");
              location.href = "home.php";
          </script>
        <?php
        } else {
          echo '<p>사용자 이름 또는 비밀번호가 틀렸습니다.</p>';
        }
      }
    ?>
  </body>
</html>