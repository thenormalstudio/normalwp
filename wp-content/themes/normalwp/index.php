<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<button type="button" class="opennav">About</button>

		<?php if( have_rows('gallery') ): ?>
		  <section id="content" role="main">
		    <?php while( have_rows('gallery') ): the_row(); ?>

					<?php $type = get_sub_field('type'); ?>

		      <?php if ( $type == 'title' ) : ?>

						<?php

		          if( have_rows('title') ):
		            while( have_rows('title') ): the_row();

		              $title_text = get_sub_field('title_text');
		              $title_color = get_sub_field('title_color');

		              $size = wp_is_mobile() ? 'medium' : 'large';

		              $landscapeimg = get_sub_field('landscape_image');
		              $landscape_src = wp_get_attachment_image_src( $landscapeimg, $size );

		              $portraitimg = get_sub_field('portrait_image');
		              $portrait_src = wp_get_attachment_image_src( $portraitimg, $size );

		            endwhile;
		          endif;

		        ?>

		        <div class="titletile">
		          <div class="landscape tileimage" style="background-image: url(<?php echo $landscape_src[0]; ?>)"></div>
		          <div class="portrait tileimage" style="background-image: url(<?php echo $portrait_src[0]; ?>)"></div>
		          <h1 style="color: <?php echo $title_color; ?>"><?php echo $title_text; ?></h1>
		        </div>

      		<?php elseif ( $type == 'video' ) : ?>

						<?php
		          $vid_src = get_sub_field('video');
		          $vid_filename = pathinfo($vid_src);
		        ?>

		        <div class="tile video">

		          <video autoplay loop muted="true">
		            <source src="<?php echo $vid_filename['dirname'] . "/" . $vid_filename['filename'] ?>.mp4" type="video/mp4">
		            <source src="<?php echo $vid_filename['dirname'] . "/" . $vid_filename['filename'] ?>.ogv" type="video/ogg">
		          </video>

		        </div>

					<?php else : ?>

						<?php

		          if ( $type == 'gif' ) :
		            $gif = get_sub_field('gif');
		            $img_src = wp_get_attachment_image_src( $gif, 'full' );
		          else :
		            $size = wp_is_mobile() ? 'medium' : 'large';
		            $img = get_sub_field('image');
		            $img_src = wp_get_attachment_image_src( $img, $size );
		          endif;

		        ?>

		        <div class="tile" style="background-image: url(<?php echo $img_src[0]; ?>)"></div>

					<?php endif ; ?>

	  		<?php endwhile; ?>
			</section>
		<?php endif ; ?>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
