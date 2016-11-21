<?php
/**
 * Template Name: Not A Member Template
 *
 * Description: Handle logins without necessary privs.
 *
 * @since HCommons
 */
get_header(); ?>

<div class="page-full-width">

        <div id="primary" class="site-content">
                <div id="content" role="main">

                        <?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="entry-content">

	<?php $memberships = Humanities_Commons::hcommons_get_user_memberships();
	if ( ! empty( $memberships ) ) {
		the_content();
	} else if ( ! empty( Humanities_Commons::hcommons_get_session_username() ) ) {
		echo '<h1 class="entry-title">Something is wrong!</h1>';
		echo "You have logged in with a username (" . Humanities_Commons::hcommons_get_session_username() . ") that does not have any memberships.";
		echo "Please let us know.";
	} else {
		$identity_provider = Humanities_Commons::hcommons_get_identity_provider();
		echo '<h1 class="entry-title">Unknown Login</h1>';
		echo "You have chosen a login method (" . $identity_provider . ") that is not linked to any account in Humanities Commons.";
	} ?>
		</div><!-- .entry-content -->

	</article><!-- #post -->

                        <?php endwhile; // end of the loop. ?>

                </div><!-- #content -->
        </div><!-- #primary -->

</div><!-- .page-full-width -->
<?php get_footer(); ?>

