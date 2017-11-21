<div>
    <?php if(isset($_SESSION['is_logged_in'])):?>
    <a href="<?php ROOT_URL ?>shares/add" class="btn btn-success" style="margin-bottom: 30px">Add Share</a>
    <?php endif; ?>
    <?php foreach ($viewmodel as $item) : ?>
        <div class="well">
            <h3><?php echo $item['title']; ?></h3>
            <small><?php echo $item['create_date']?></small>
            <hr>
            <p><?php echo $item['body']; ?></p>
            <a href="<?php echo $item['link']; ?>" class="btn btn-primary" target="_blank">Go to website</a>
        </div>
    <?php endforeach; ?>
</div>