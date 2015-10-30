<?php /* Template Name: Contact */

$contacts = new WP_Query(array('post_type' => 'contact')); ?>

<?php get_header(); ?>
<ul class="kontakter">
	<?php if( $contacts->have_posts() ): while($contacts->have_posts() ): $contacts->the_post(); ?>
		<li>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p>Telefonnummer: <?php echo get_post_meta(get_the_id(), '_my_meta_value_key' )[0]; ?></p>
			<p>Email: <?php echo get_post_meta(get_the_id(), '_my_email_meta_value_key' )[0]; ?></p>
		</li>
	<?php endwhile; endif; ?>
</ul>

<?php get_footer(); ?>