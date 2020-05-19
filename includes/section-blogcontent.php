<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="blog-post">

		<?php if( has_post_thumbnail(  ) ):?>
			<img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-4">
		<?php endif;?>

		<h2 class="blog-post-title"><?php the_title(); ?></h2>

		<?php the_content(); ?>

		<p class="blog-post-meta">
			<?php the_date('l jS F, Y'); ?> by 
			<a href="<?php get_the_author_meta('user_url')?>">
				<?php 
					$fname=  get_the_author_meta('first_name');
					$lname=  get_the_author_meta('last_name');
					echo( $fname . ' ' . $lname );
				?>
			</a>
		</p>

		<!-- Tags -->
		<?php
		$tags = get_the_tags();
		foreach($tags as $tag): ?>

			<a href="<?php echo get_tag_link( $tag->term_id );?>" class="badge badge-dark">
				<?php echo $tag->name;?>
			</a>

		<?php endforeach; ?>
		<!-- End tags -->

		<!-- categories -->
		<?php
		$categories = get_the_category();
		foreach ($categories as $cat): ?>
			<a href="<?php echo get_category_link( $cat->term_id );?>">
			<?php echo $cat->name;?>
			</a>
			

		<?php endforeach; ?>
	</div>
<?php endwhile; endif;?>
<?php wp_link_pages( )?>

<!-- // Comments -->
<?php
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
?>

