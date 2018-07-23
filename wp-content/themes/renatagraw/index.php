<?php get_header(); ?>

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
	
	<?php $postID = 10; ?>
	<?php $post = get_post($postID); ?>
	<?php setup_postdata($post); ?>
	
	<?php $assets = get_field("gallery"); ?>
		
	<section id="content" role="main">

		<?php $isFirst = true; ?>
		<?php foreach( $assets as $asset ) : ?>
			<?php $type = $asset['type']; ?>

			<?php if ( $type == 'video' ) : ?>

				<?php if ( !wp_is_mobile() ) : ?>

					<?php 
						$vid_src = $asset['video'];
						$vid_filename = pathinfo($vid_src);
					?>
					<div class="tile video">

						<video autoplay loop muted="true">
						  <source src="<?php echo $vid_filename['dirname'] . "/" . $vid_filename['filename'] ?>.mp4" type="video/mp4">
						  <source src="<?php echo $vid_filename['dirname'] . "/" . $vid_filename['filename'] ?>.ogv" type="video/ogg">
						</video>

						<?php if($isFirst): ?>
							<div id="site-title">
								<h1><?php bloginfo('name'); ?></h1>
							</div>
							<?php $isFirst = false;?>
						<?php endif; ?>

					</div>

				<?php endif ; ?>

			<?php endif ; ?>

			<?php if ( $type == 'image' ) : ?>

				<?php
					$size = wp_is_mobile() ? 'medium' : 'large';
					$bg_attachment = wp_is_mobile() ? ' scroll' : ' tile';
					$img_src = wp_get_attachment_image_src( $asset['image'], $size );
				?>

				<div class="image<?php echo $bg_attachment;?>" style="background-image: url(<?php echo $img_src[0]; ?>)">

					<img src="<?php echo esc_url( $img_src[0] ); ?>" width="<?php echo $img_src[1] ?>" height="<?php echo $img_src[2] ?>" alt="<?php echo pathinfo($img_src[0], PATHINFO_BASENAME)?>">

					<?php if($isFirst): ?>
						<div id="site-title">
							<h1><?php bloginfo('name'); ?></h1>
						</div>
						<?php $isFirst = false;?>
					<?php endif; ?>

				</div> 

			<?php endif ; ?>

			<?php if ( $type == 'gif' ) : ?>

				<?php 
					$img_src = wp_get_attachment_image_src( $asset['gif'], 'full' );
					$bg_attachment = wp_is_mobile() ? ' scroll' : ' tile';
				?>

				<div class="image<?php echo $bg_attachment;?>" style="background-image: url(<?php echo $img_src[0]; ?>)">

					<img src="<?php echo esc_url( $img_src[0] ); ?>" width="<?php echo $img_src[1] ?>" height="<?php echo $img_src[2] ?>" alt="<?php echo pathinfo($img_src[0], PATHINFO_BASENAME)?>">

					<?php if( $isFirst ) : ?>
						<div id="site-title">
							<h1><?php bloginfo('name'); ?></h1>
						</div>
						<?php $isFirst = false;?>
					<?php endif; ?>

				</div> 

			<?php endif ; ?>

		<?php endforeach; ?>
		
		<div id="hacky-mask"></div>

	</section>
	
	<section id="nav">
		<div id="nav-inner">

			<a href="#" class="to-info">
<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
<g>
	<path fill="#19B14B" d="M18.89,28.325L18.89,28.325c-1.232,0-2.39-0.48-3.258-1.352c-1.796-1.805-1.814-4.719-0.045-6.495
		l3.838-3.852c0.34-0.344,0.326-0.938-0.033-1.298c-0.242-0.242-0.529-0.262-0.678-0.262h-0.001c-0.14,0-0.399,0.015-0.612,0.229
		l-3.837,3.842c-1.717,1.725-4.737,1.714-6.459-0.02c-1.803-1.809-1.826-4.729-0.053-6.506l3.837-3.854
		c0.308-0.309,0.464-0.816,0.082-1.2c-0.147-0.147-0.319-0.222-0.51-0.222l0,0c-0.234,0-0.471,0.108-0.665,0.303l-3.838,3.852
		L4.062,8.909l3.837-3.853c0.888-0.889,2.046-1.381,3.261-1.381l0,0c1.167,0,2.27,0.462,3.104,1.3
		c1.756,1.764,1.72,4.561-0.083,6.369l-3.835,3.851c-0.334,0.336-0.309,0.971,0.053,1.336c0.231,0.232,0.506,0.268,0.649,0.268
		c0.137,0,0.401-0.033,0.622-0.255l3.837-3.814c0.851-0.852,1.991-1.283,3.207-1.283c0.001,0,0.001,0,0.001,0
		c1.238,0,2.4,0.443,3.273,1.317c1.789,1.799,1.806,4.69,0.03,6.465l-3.836,3.844c-0.339,0.342-0.318,0.958,0.045,1.319
		c0.238,0.241,0.517,0.272,0.663,0.272l0,0c0.138,0,0.399-0.032,0.618-0.249l3.836-3.854l2.595,2.584l-3.838,3.85
		C21.247,27.854,20.108,28.325,18.89,28.325z"/>
</g>
</svg>

			</a>
			
			<a href="#" class="to-top">
<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="27px" height="30px" viewBox="-3 0 27 30" enable-background="new -3 0 27 30" xml:space="preserve">
<polygon fill="#1CB24B" points="20.93,12.449 13.182,4.701 13.186,4.697 10.503,2.015 0.07,12.449 2.925,15.131 8.5,9.729 
	8.5,27.984 12.5,27.984 12.5,9.537 18.172,15.131 "/>
</svg>

			</a>

		</div>
	</section>

<?php get_footer(); ?>