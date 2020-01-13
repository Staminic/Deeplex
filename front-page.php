<?php get_header(); ?>

<?php
  $args = array(
    'post_type' => 'page',
    'category_name' => 'sections',
    'orderby' => 'menu_order',
    'order'   => 'ASC',
  );

  $query = new WP_Query( $args );
?>

    <aside>
      <?php wp_nav_menu(
        array(
          'theme_location'  => 'primary',
          'container_class' => 'collapse navbar-collapse',
          'container_id'    => 'navbarNavDropdown',
          'menu_class'      => 'navbar-nav ml-auto',
          'fallback_cb'     => '',
          'menu_id'         => 'main-menu',
          'depth'           => 2,
          'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
        )
      ); ?>
    </aside>

    <?php if ( $query->have_posts() ) : ?>

      <?php while ( $query->have_posts() ) : $query->the_post(); ?>

        <?php $thumbnailPath = get_the_post_thumbnail_url( $post->ID, 'large' ); ?>
        <?php $pageTemplateName = basename( get_page_template(), '.php' ); ?>

        <section id="<?php echo $post->post_name; ?>" class="section  <?php echo ($thumbnailPath ? 'background-img' : ''); ?>" <?php echo ($thumbnailPath ? 'style="background-image: url(' . $thumbnailPath . ')"' : ''); ?>>
          <?php get_template_part( 'loop-templates/content', $pageTemplateName ); ?>
        </section>

      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>

    <?php else : ?>
      <p>
        <?php _e( 'Sorry, no posts matched your criteria.' ); ?>
      </p>

    <?php endif; ?>

    <section class="section">
      <?php get_footer(); ?>
    </section>

    </div>

  <?php wp_footer(); ?>

  </body>

</html>
