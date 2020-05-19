<?php get_header();?>
<section class="page-wrap">
  <div class="container">

    <h2><?php echo single_cat_title( ); ?></h2>

    <?php get_template_part( 'includes/section', 'archive' );?>

    <!-- pagination -->
    <nav aria-label="Posts navigation">
      <ul class="pagination">
        <li class="page-item"><?php next_posts_link( '← Previous' ); ?></li>
        <li class="page-item"><?php previous_posts_link( 'Next →' ); ?></li>
        
      </ul>
    </nav>

  </div>
</section>
<?php get_footer();?>