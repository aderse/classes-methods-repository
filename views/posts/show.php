<div class="container">

    <p><?php echo $post->title; ?></p>

    <p><?php echo $post->content; ?></p>

    <p>By: <?php echo $post->author; ?></p>

</div>

<?php
if( $sidebar ) {
    require_once( '../sidebars/' . $sidebar );
}