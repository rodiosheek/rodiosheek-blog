<?php include ROOT . '/views/header.php'; ?>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
        <h2 style="text-align: center; color: #5D4384;">
            <?=$result['header']; ?>
        </h2>
                <div class="delete_record">
                    <?php if(ADMIN): ?>
                        <a class="btn btn-sm btn-danger" href="?action=delete-record&id=<?=$result['id']?>">Delete</a>
                    <?php endif; ?>
                </div>
        <div class="content"><?=$result['content'];?></div>
                <div class="after-content">
        <div class="author"><?=$result['author']; ?></div>
        <div class="date"><?=$result['date']; ?></div>
                </div>

        <h4 style="text-align: center; color: #5D4384;">Comments</h4>

        <?php foreach($comments as $row): ?>
                <div class="commentd">
            <div class="comment"><?=$row['comment']; ?></div>
            <div class="author-date">
                <div class="author"><?=$row['author'];?></div>
                <div class="date"><?=$row['date'];?></div>
                <div class="delete_comment">
                    <?php if(ADMIN): ?>
                        <a class="btn btn-sm btn-danger" href="?action=delete-record&id=<?=$result['id']?>">Delete</a>
                    <?php endif; ?>
                </div>
            </div>
                </div>

        <?php endforeach; ?>

                <div class="comment-form">
                    <h4 style="text-align: center; color: #5D4384;">Add comment</h4>
                    <form action="?action=add-comment" method="post" class="well">
                        <input name="record_id" value="<?=$result['id']; ?>" type="hidden">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input class="form-control" name="author" id="author" type="text">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment text</label>
            <textarea class="form-control" rows="3" name="comment" id="comment">

            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add comment</button>
                    </form>
                </div>

            </div>
            <div class="col-md-4">
                <?php require(ROOT . '/includes/twitter_widget.php');?>
            </div>
        </div>



    </div><!-- /.container -->

<?php include ROOT . '/views/footer.php'; ?>