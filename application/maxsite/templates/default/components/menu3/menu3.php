<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/*
	(c) MaxSite CMS, http://max-3000.com/
	Дополнительное меню. Может использоваться как подкомпонет
*/
?>

<div class="MainMenu3"><div class="wrap">
	<ul class="menu">
		<?php
			if ($menu = mso_get_option('menu3', 'templates', '')) 
				echo mso_menu_build($menu, 'selected', false);
		?>
	</ul>
</div></div><!-- div class="MainMenu3" -->
