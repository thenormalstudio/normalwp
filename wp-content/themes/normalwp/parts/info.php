<?php $postID = 8 ?>
<?php $post = get_post($postID); ?>
<?php setup_postdata($post); ?>

<section id="info">

<div id="card" class="content-fade">

  <div id="title" class="col-2">
    <h2><a href="#"><?php bloginfo('name'); ?></a></h2>
  </div>

  <div id="card-inner">

    <div id="contact" class="col-2">
      <a href="mailto:hi@thenormalstudio.com">email</a>
    </div>

    <div id="text" class="col-10">

      <div id="about">
        <?php the_content(); ?>
      </div>

      <?php $links = get_field("links");?>
      <?php /* var_dump($links) */ ?>
      <?php if( $links != false ):?>
      <ul id="social">
        <?php foreach($links as $link):?>
        <li class="col-2"><a href="<?php echo $link["url"]?>" target="_blank"><?php echo $link["title"] ?></a></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>

    </div>

  </div>

  <?php if(get_field("text")):?>
    <div class="fine-print">
      <div class="fine-print-inner">
        <?php echo get_field("text");?>
      </div>
    </div>
  <?php endif; ?>

</div>

</section>
