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
$file = $_POST['file'];

if(empty($title) ||empty($contents)){
?>
    <script>
        alert("제목 또는 내용에 빈칸이 있습니다.");
        location.href = "write_post.php";
    </script>
<?php
}else if(!empty($_FILES)){
    var_dump($_FILES);
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $file = $_FILES['file'];
    $error = $file["error"];
    $name = $file["name"];
    $type = $file["type"];
    $size = $file["size"];
    $tmp_name = $file["tmp_name"];
    $conn = mysqli_connect('localhost', 'root', '', 'test');
}else{
$conn = mysqli_connect('localhost', 'root', '', 'test');

$sql = "
    INSERT INTO posts(title, contents, writer,category)
    VALUES('{$title}', '{$contents}', '{$_SESSION[ 'id' ]}','{$category}')";
echo $sql;
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
?>


