<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php bloginfo( 'name' ); ?>
            </a>
        </h1>
        <nav class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-principal',
                'fallback_cb'    => false,
                'depth'          => 1,
            ) );
            ?>
        </nav>
    </div>
</header>

<main class="site-content">
    <section class="main-articles">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-card' ); ?>>
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="btn-leer-mas">
                        <?php esc_html_e( 'Ver servicio', 'taller-mecanico' ); ?>
                    </a>
                </article>
            <?php endwhile; ?>

            <div class="navigation pagination">
                <?php the_posts_pagination(); ?>
            </div>

        <?php else : ?>
            <p><?php esc_html_e( 'No se encontraron servicios o publicaciones.', 'taller-mecanico' ); ?></p>
        <?php endif; ?>
    </section>

    <aside class="sidebar">
        <?php if ( is_active_sidebar( 'sidebar-principal' ) ) : ?>
            <?php dynamic_sidebar( 'sidebar-principal' ); ?>
        <?php else : ?>
            <h3><?php esc_html_e( 'Contacto Rápido', 'taller-mecanico' ); ?></h3>
            <p>📍 Calle Examen, Nº 42</p>
            <p>📞 Teléfono: 900 123 456</p>
            <p>⏰ Lun - Vie: 8:00 - 18:00</p>
        <?php endif; ?>
    </aside>
</main>

<footer class="site-footer">
    <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. Todos los derechos reservados.</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>


