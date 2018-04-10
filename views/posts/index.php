<div class="main-content container">

    <p>Here is a list of all posts:</p>

    <?php foreach($posts as $post) { ?>
        <p>
            <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'><?php echo $post->title; ?></a>
        </p>
    <?php } ?>

</div>
