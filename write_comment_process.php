<?php
	include 'session_head.php';
	$contents = $_POST['contents'];
	if(!$jb_login){
    ?>
    	<script>
        	alert("로그인하세요.");
            history.back();
        </script>
    <?php
 	}
 	else{
		$post_id = $_POST['post_id'];
		$writer = $_SESSION[ 'id' ];
		$contents = $_POST['contents'];
		$conn = mysqli_connect('13.209.116.117', 'root', '1234', 'test',56095);
		$sql = "insert into comments(post_id,contents, writer) values('{$post_id}', '{$contents}', '{$writer}')";
		$result = mysqli_query($conn, $sql);
		if ($result === false) {
			echo "add record fail";
			echo mysqli_error($conn);
		} else{
        ?>
            <script>
            	alert("댓글 게시 성공");
                history.back();;
            </script>
        <?php
        }
	}
?>