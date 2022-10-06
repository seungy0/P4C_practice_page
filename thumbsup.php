<?php
    include 'session_head.php';
	$bno = $_GET['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'test');
    mysqli_query($conn,"UPDATE posts SET recommand = recommand + 1 WHERE idx='{$_GET['id']}';");
?>
<script type="text/javascript">alert("추천되었습니다.");history.back();</script>