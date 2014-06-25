<?php foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['DOG_BREED_NAME'] ?></h2>
    <div class="main">
        <?php echo $news_item['MAIN_FEATURES'] ?>
    </div>
    <p><a href="news/<?php echo $news_item['DOG_BREED_NAME'] ?>">View article</a></p>

<?php endforeach ?>