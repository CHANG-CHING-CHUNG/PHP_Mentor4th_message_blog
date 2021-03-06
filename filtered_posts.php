<?php 
      $pattern = "/\/blog/i";
      $location =  preg_replace($pattern, "", $_SERVER['REQUEST_URI']);
?>
<?php if (empty($_GET['page-id'])) { header("location: .$location&page=topics_area&page-id=1");}?>
<?PHP $page_id = (int)$_GET['page-id']?>
<?php require_once('config.php'); ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php')?>
<?php require_once( ROOT_PATH . '/includes/head_section.php'); ?>
<?php 
  if (isset($_GET['topic'])) {
    $topic_id = $_GET['topic'];
    $posts = getFilterPostsByPageNum($page_id,$topic_id);
  }
  $totalPages = ceil(getFilterPostsCount($topic_id) / 5);
?>


  <title>John 的部落格 | 分類專區</title>
</head>
<body>
  <!-- Navbar -->
  <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
  

  <!-- Page content -->
  <section class="content">
    <div class="container">
      <h2 class="content-title">所有<?php echo getTopicNameById($topic_id);?>類別的文章</h2>
      <div class="row column">
        <?php foreach($posts as $post): ?>
        <div class="case">
          <div class="row">
            <div class="img-box d-flex">
              <a href="single_post.php?id=<?php echo $post['id'];?>" class="img" style="background-image: url(<?php echo BASE_URL . 'static/images/' . $post['image'];?>);"></a>
            </div>
            <div class="text-box d-flex">
              <div class="text">
                <a href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id']?>" class="subheading"><?php echo $post['topic']['name'];?></a>
                <h2>
                  <a href="single_post.php?id=<?php echo $post['id'];?>"><?php echo $post['title'];?></a>
                </h2>
                <div class="media-social">
                  <a href="#">
                    <span class="icon-github"></span>
                  </a>
                </div>
                <div class="meta">
                  <span class="date"><?php echo date("F j, Y", strtotime($post['created_at']))?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
      <div class="pages col row flex-center">
        <div class="prev"><</div>
        <?php for($i=1; $i<=$totalPages; $i+=1) { ?>
          <div class="page" data-page=<?php echo $i?>><?php echo $i;?></div>
        <?php } ?>
        <div class="next">></div>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <script src="./static/js/paginator_filter.js"></script>
  <?php include( ROOT_PATH . '/includes/footer.php');?>