<?php
$s=new WP_Query(array(
	's' => $_GET['s']
));
echo "<ul>";
while($s->have_posts()) {
	$s->the_post();
	echo "<li>";
	//var_dump($s->post);
	echo "<a href='".get_the_permalink( $s->post->ID )."'>".get_the_title( $s->post->ID )."</a>" ;
	echo "</li>";
}
echo "</ul>";
wp_reset_postdata();
;?>