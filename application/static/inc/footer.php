	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="<?= Versioning::auto(STATIC_DIR."/js/global.js"); ?>"></script>
	<?php
		
		// Load additional JS files
		if (isset($additional['js'])){
			echo "\n".'<!-- Additional JS -->'."\n";
			foreach ($additional['js'] as $js){
				echo '<script type="text/javascript" src="'.Versioning::auto($js.'.js').'" /></script>'."\n";	
			}
		}
		
	?>

    </body>
</html>
