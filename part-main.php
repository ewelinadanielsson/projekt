<?php if (have_posts()) : the_post(); while( have_posts() ): the_post(); ?>

<article>
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<p><?php the_excerpt(); ?></p>
	<?php the_content(); ?>
</article>

<?php endwhile;

else :
	echo '<p>Inga fler inlägg</p>';

endif; ?>