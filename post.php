<?php 
  include 'session_head.php';
  $conn = mysqli_connect('13.209.116.117', 'root', '1234', 'test',56095);
  $sql = "SELECT * FROM `posts` WHERE `idx` = '{$_GET['id']}'";
  // 방문자 수 연산
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  date_default_timezone_set('Asia/Seoul');
  $timestamp = strtotime("Now");
  $views = $row['views'];
  $now = date("Y-m-d H:i:s");
  if($timestamp-strtotime($row['recent_view'])>=3600){
    mysqli_query($conn,"UPDATE posts SET views = views + 1 WHERE idx='{$_GET['id']}'");
    $views = $views+1;
	mysqli_query($conn,"UPDATE posts SET recent_view = '{$now}' WHERE idx='{$_GET['id']}'");
  }
?>
<html lang="en">
<head>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
  <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="./home.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <span class="fs-4">P4C practice</span>
        </a>
        <?php
          if ( !$jb_login ) {
        ?>
        <div class="col-md-3">
            <a href="./signin.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>
            <a  href="./signup.php"><button type="button" class="btn btn-primary">Sign-up</button></a>
        </div>
        <?php
          } else {
        ?>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://png.pngtree.com/png-vector/20190909/ourmid/pngtree-outline-user-icon-png-image_1727916.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" style="">
            <li><a class="dropdown-item" href="./signout.php">Sign out</a></li>
          </ul>
        </div>
        <?php
          }
        ?>
    </header>
<div class="container">
  <main>
    <div class="col-xxl-4">
      <div>
        <div class="row g-3">
          <div class="col-1">
              <label for="id" class="form-label">[<?php if($row['category']=='free') {echo "자유";} else{echo "공부";} ?>]</label>
            </div>
            <div class="col-11">
              <label for="id" class="form-label"><?php echo $row['title'] ?></label>
            </div>
            <hr class="my-4">
            <div class="col-9">
            </div>
            <div class="col-1">
              <p for="views" class="form-label">조회수: <?php echo $views ?></p>
            </div>
            <div class="col-2">
              <a href="thumbsup.php?id=<?php echo $_GET['id']; ?>">
                <button for="recommand" class="btn btn-sm btn-light">👍추천</p>
              </a>
            </div>
			<div class="col-1">
				<p>
						첨부파일 : 
				</p>
			</div>
			<div class="col-11">
				<a href='./upload/<?php echo $row['file']?>'>
					<span><?php echo $row['file']?></span>
				</a>
            </div>
            <div class="col-12">
              <p for="contents" class="form-label"><?php echo nl2br($row['contents']) ?></p>
            </div>
            
          </div>
      </div>
    </div>
  </main>
</div>
    <!-- <script src="./js/bootstrap.bundle.min.js"></script> -->
      <!-- <script src="form-validation.js"></script> -->
      <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>