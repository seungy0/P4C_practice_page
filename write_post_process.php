<?php 
  include 'session_head.php';
?>
<?php
// error_reporting(-1);
// ini_set('display_errors', 'On');
// set_error_handler("var_dump");

$title = $_POST['title'];
$category = $_POST['category'];
$contents = $_POST['contents'];

if(empty($title) ||empty($contents)){
?>
    <script>
        alert("제목 또는 내용에 빈칸이 있습니다.");
        location.href = "write_post.php";
    </script>
<?php
}else{
    //var_dump($_FILES);
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $file = $_FILES["file"];
    $error = $file["error"];
    $name = $file["name"];
    $type = $file["type"];
    $size = $file["size"];
    $tmp_name = $file["tmp_name"];
    $conn = mysqli_connect('13.209.116.117', 'root', '1234', 'test',56095);
    $sql = "
    insert into posts(title, contents, writer,category,file) values('{$title}', '{$contents}', '{$_SESSION[ 'id' ]}','{$category}','{$name}')";
    $folder = "/workspace/P4C_practice_page/upload/".basename($name);
    move_uploaded_file($tmp_name,$folder);
    $result = mysqli_query($conn, $sql);
    if ($result === false) {
        echo "add record fail";
        echo mysqli_error($conn);
    } else{
        ?>
            <script>
                 alert("게시 성공");
                location.href = "home.php";
            </script>
        <?php
        }
}
// else{
// $conn = mysqli_connect('localhost', 'root', '', 'test');

// mysqli_set_charset($conn,"utf8");
// $sql = "
//     INSERT INTO posts(title, contents, writer,category)
//     VALUES('{$title}', '{$contents}', '{$_SESSION[ 'id' ]}','{$category}')";
// echo $sql;
// $result = mysqli_query($conn, $sql);

// if ($result === false) {
//     echo "add record fail";
//     echo mysqli_error($conn);
// } else{
//     ?>
//         <script>
//              alert("게시 성공");
//             location.href = "home.php";
//         </script>
//     <?php
//     }
// }
?>


