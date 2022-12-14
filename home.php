<?php 
  include 'session_head.php';
require 'pw.php';
  $category = $_GET["category"];
  $catago =$_GET["catago"];
  $search =$_GET["search"];
  // echo $category;
  $conn = mysqli_connect('13.209.116.117', 'root', $dbpw, 'test',56095);
  $verified = false;
  if($jb_login){
	  $verified = mysqli_fetch_array(mysqli_query($conn,"SELECT verify FROM users WHERE id='{$_SESSION[ 'id' ]}'"))['verify'];
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <!-- <meta charset="utf-8"> -->
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
    <div class="row g-3">
		<div class="col-5">
		<a href="https://pc-practice-page-pvfho.run.goorm.io/P4C_practice_page/home.php" class="text-decoration-none">
		  <button type="button" class="btn btn-light">전체</button>
		</a>
		<a href="https://pc-practice-page-pvfho.run.goorm.io/P4C_practice_page/home.php?category=free" class="text-decoration-none">
		  <button type="button" class="btn btn-light">자유</button>
			</a>
		<a href="https://pc-practice-page-pvfho.run.goorm.io/P4C_practice_page/home.php?category=study" class="text-decoration-none">
		  <button type="button" class="btn btn-light">공부</button>
			</a>
		</div>
		<div class="col-5">
	  <form action="home.php" method="get">
		<input type="text" name="category" value='<?php echo $category; ?>' style='display:none'/>

      <select name="catago">
        <option value="title">제목</option>
        <option value="contents">내용</option>
        </select>
		<input type="text" name="search" size="40" required="required" /> <button>검색</button>
      </form>
		</div>
		<?php
          if ( $jb_login && $verified) {
      ?>
		<div class="col-2">
	  
      <a href="./write_post.php">
        <button type="button" class="btn btn-light" style="float:right;">글쓰기</button>
      </a>
		</div>
		<?php
		  }else if($jb_login){
		?>
		<div class="col-2">
        <button type="button" class="btn btn-light" style="float:right;">글쓰기(이메일 인증 필요)</button>
		</div>
		<?php
		  }
      ?>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr class="table-primary">
              <th style="width: 5%" scope="col">#</th>
              <th style="width: 70%" scope="col">제목</th>
              <th style="width: 15%" scope="col">글쓴이</th>
              <th style="width: 5%" scope="col">조회수</th>
              <th style="width: 5%" scope="col">추천</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              // mysqli_query($conn, "set session character_set_connection=utf8;");
              // mysqli_query($conn, "set session character_set_results=utf8;");
              // mysqli_query($conn, "set session character_set_client=utf8;");
			  $sql = "SELECT * FROM posts";
			  if($category && $category!=''){
				  $sql = $sql." WHERE category='{$category}'";
				  if($catago){
				  $sql = $sql." AND $catago like '%$search%'";
			  }
			  }
			  else{
				  if($catago){
				  $sql = $sql." WHERE $catago like '%$search%'";
			  }
			  }
              $sql = $sql." ORDER BY idx DESC";
              $res = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_array($res)){
            ?>
            <tr>
              <td><?php echo $row['idx'];?></td>
              <td onClick="location.href='./post.php?id=<?php echo $row['idx'];?>'" style="cursor:pointer; text-decoration-line: underline;"><?php echo $row['title'];?></td>
              <td><?php echo $row['writer'];?></td>
              <td><?php echo $row['views'];?></td>
              <td><?php echo $row['recommand'];?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
