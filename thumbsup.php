<?php
    include 'session_head.php';
	require 'pw.php';
	$bno = $_GET['id'];
    $conn = mysqli_connect('13.209.116.117', 'root', $dbpw', 'test',56095);
    mysqli_query($conn,"UPDATE posts SET recommand = recommand + 1 WHERE idx='{$_GET['id']}';");
?>
<script type="text/javascript">alert("추천되었습니다.");history.back();</script>