<!doctype HTML>
<html>
<head>
<meta charset="utf-8">
<title>The balm</title>
<link href="<?php echo get_template_directory_uri() ?>/style.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300|Rancho' rel='stylesheet' type='text/css'>
<?php wp_head() ?>
</head>
<style>
body  {
    background-image: url("<?php echo get_template_directory_uri() ?>/img/bakgrund.png");
}
</style>
</style>

<body>
	<div class="wrapper">

	<?php wp_nav_menu( array( 
		'theme_location' => 'top_menu', 
		'container_class' => 'topnav', 
		'menu_id' => 'topmeny', 
		'container' => 'nav' ) 
	); ?>


	<header>

		<img src="<?php echo get_template_directory_uri();?>/img/header.jpg" id="header">

		<?php wp_nav_menu( array( 
		'theme_location' => 'main_menu', 
		'container_class' => 'mainnav', 
		'menu_id' => 'mainmeny', 
		'container' => 'nav' ) 
		); ?>

		<div class="sok">
		<form id="searchform">
		<input type="text" id="pattern" name="pattern" placeholder="Sök produkt" maxlength="100" class="ruta"></input> 
		<input type="submit" value="Sök"></input>
		</form>
		</div>
		<div id="result">
		</div>

	</header>