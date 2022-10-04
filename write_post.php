<?php 
  include 'session_head.php';
?>
<html lang="en">
<head>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container {
        max-width: 960px;
    }
    </style>
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>글쓰기</h2>
    </div>
    <div class="col-xxl-4">
      <div>
        <form class="needs-validation" action="write_post_process.php" method="POST" novalidate="">
          <div class="row g-3">
            <div class="col-12">
              <label for="id" class="form-label">제목</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="" value="" required>
              <div class="invalid-feedback">
                empty title.
              </div>
            </div>
            <div class="col-12">
              <label for="id" class="form-label">게시판 이름</label>
              <select class="form-select" aria-label="Default select example" name="category">
                <option value="free" selected>자유</option>
                <option value="study">공부</option>
              </select>
              <div class="invalid-feedback">
                empty title.
              </div>
            </div>
            <div class="col-12">
              <label for="contents" class="form-label">내용</label>
              <div class="input-group has-validation">
                <textarea class="form-control input-lg" id="contents" name="contents"></textarea>
              <div class="invalid-feedback">
                  Your contents is required.
                </div>
              </div>
            </div>
            <div class="col-12">
              <label for="" class="form-label">첨부파일(gif,jpg,jpeg,png)</label>
              <input type="file" class="form-control" id="file" name="file" required="">
              <div class="invalid-feedback">
                file is wrong
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </main>
</div>
    <!-- <script src="./js/bootstrap.bundle.min.js"></script> -->
      <!-- <script src="form-validation.js"></script> -->
  

</body>
</html>