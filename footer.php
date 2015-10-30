	<footer>
		<ul id="footermeny">
			<li>
				<h3>Kategorier</h3>
				<nav class="footernav">
					<?php wp_nav_menu( array( 
					'theme_location' => 'footer_menu', 
					'container_class' => 'footernav', 
					'menu_id' => 'footermeny', 
					'container' => 'nav' ) 
					); ?>
				</nav>
			</li>
		
			<li id="info">
				<h3>Information</h3>
				<p id="footer">Vi som startade den här sidan är två tjejer som båda är väldigt intresserade av skönhet och älskar the Balms produkter. Vi är den enda svenska officiella återförsäljaren och har en nära relation med the Balms grundare Marissa Shipman. Filosofin för företaget är ”Skönhet på fem minuter” och erbjuder snabba lösningar för ett brett spektrum av skönhetsönskemål.</p>
			</li>
		</ul>
	</footer>

</div>
<script src="<?php echo get_template_directory_uri() ?>/ajax-search.js"></script>
</body>
</html>