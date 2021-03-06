<?php
/**
 * The template for displaying content in the single.php template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'hnews item' ); ?> itemscope itemtype="https://schema.org/Article">

	<?php do_action('largo_before_post_header'); ?>

	<header>

		<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php if ( $subtitle = get_post_meta( $post->ID, 'subtitle', true ) ) : ?>
			<h2 class="subtitle"><?php echo $subtitle ?></h2>
		<?php endif; ?>

<?php largo_post_metadata( $post->ID ); ?>

	</header><!-- / entry header -->

	<?php
		do_action('largo_after_post_header');

		largo_hero(null,'span12');

		do_action('largo_after_hero');
    ?>

	<?php get_sidebar(); ?>

	<section class="entry-content clearfix" itemprop="articleBody">

        <div class="byline">
            <?php 
                echo '<div class="byline-date">' . get_the_date( 'm.d.Y' ) . '</div>';
                echo '<span class="sep"> | </span>';
                largo_byline( true, true, get_the_ID() ); 
                if ( !of_get_option( 'single_social_icons' ) == false ) {
                    echo '<span class="sep"> | </span>';
                    largo_post_social_links();
                }
            ?>
        </div>
		
		<?php largo_entry_content( $post ); ?>
		
	</section>

	<?php do_action('largo_after_post_content'); ?>

</article>
