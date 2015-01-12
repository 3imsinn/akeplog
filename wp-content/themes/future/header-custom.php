<?php if ( get_header_image() ) : ?>  
  <a class="navbar-brand-image" itemprop="headline" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>  
<?php else: ?>

<!-- Logo Erweiteiterung -->
  <a class="navbar-brand" itemprop="headline" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?> <img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/future/images/headers/pfeil.png"></a>


<?php endif; ?>