<?php include ROOT . '/views/header.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php foreach ($records as $row): ?>

                <div class="records">
                    <h3>
                        <a href="?action=view-record&id=<?=$row['id']?>"><?=$row['header']?></a>
                        <?php if(ADMIN): ?>
                            <a class="btn btn-sm btn-danger" href="?action=delete-record&id=<?=$row['id']?>">Delete</a>
                        <?php endif; ?>
                    </h3>
                    <div class="content"><?=$row['content']?><a href="?action=view-record&id=<?=$row['id']?>">____</a></div>
                    <div class="after-content">
                        <div class="date"><?=$row['date'];?></div>
                        <div class="author"><?=$row['author'];?></div>
                        <div class="comments">
                            <a class="btn btn-primary btn-xs" href="?action=view-record&id=<?=$row['id']?>">
                                <?=$row['comments']; ?>
                                <?php if($row['comments'] > 1): ?> comments</a>
                            <?php else: ?> comment</a>
                     <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php  endforeach; ?>

          <div class="pages">
              <h5>Pages: </h5>
              <?php
              /**
               * page navigation
               */
              if ($page != 1) $pervpage = '<a href= ./?page=1><<</a>
                               <a href= ./?page='. ($page - 1) .'><</a> ';
              if ($page != $total) $nextpage = ' <a href= ./?page='. ($page + 1) .'>></a>
                                   <a href= ./?page=' .$total. '>>></a>';
              if($page - 2 > 0) $page2left = ' <a href= ./?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
              if($page - 1 > 0) $page1left = '<a href= ./?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';
              if($page + 2 <= $total) $page2right = ' | <a href= ./?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
              if($page + 1 <= $total) $page1right = ' | <a href= ./?page='. ($page + 1) .'>'. ($page + 1) .'</a>';
              echo $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage;

              ?>
          </div>



            <div class="add-record-form">
            <?php if(ADMIN): ?>

                <h4 style="text-align: center; color: #5D4384;">Add record</h4>
                <form action="?action=add-record" method="post" class="well">
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input class="form-control" name="author" id="author" type="text">
                    </div>
                    <div class="form-group">
                        <label for="header">Header</label>
                        <input class="form-control" name="header" id="header" type="text">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
            <textarea class="form-control" rows="3" name="content" id="content">

            </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add record</button>
                </form>
                <?php endif; ?>
                </div>
        </div>
        <div class="col-md-4">
            <?php require(ROOT . '/includes/twitter_widget.php');?>
        </div>
    </div>
</div><!-- /.container -->


<?php include ROOT . '/views/footer.php'; ?>