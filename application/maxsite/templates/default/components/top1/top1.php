<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/*
	(c) MaxSite CMS, http://max-3000.com/
*/

// условие вывода компонента
// php-условие как в виджетах
if ($rules = trim(mso_get_option('top1_rules_output', getinfo('template'), '')))
{
	$rules_result = eval('return ( ' . $rules . ' ) ? 1 : 0;');
	if ($rules_result === false) $rules_result = 1;
	if ($rules_result !== 1) return;
}

$logo = trim(mso_get_option('top1_header_logo', getinfo('template'), getinfo('template_url') . 'assets/images/logos/logo01.png'));

if ($logo) $logo = '<img src="' . $logo . '" alt="' . getinfo('name_site') . '" title="' . getinfo('name_site') . '">';

if (!is_type('home')) $logo = '<a href="' . getinfo('siteurl') . '">' . $logo . '</a>';

?>

<div class="menu-icons flex flex-vcenter bg-gray900 pad15-rl">
	<div class="">
		<ul class="menu menu2">
		<?php
			if ($menu = mso_get_option('menu2', 'templates', '/ | Главная ~ about | О сайте')) 
				echo mso_menu_build($menu, 'selected', false);
		?>
		</ul>
	</div>
	
	<div class="t15px t-gray500 links-no-color links-hover-t-gray100">
	<?php
		if ($fn = mso_fe('components/_social/_social.php')) require($fn);
	?>
	</div>
</div>

<div class="logo-block flex flex-vcenter pad20">
	<div class="w100-max"><?= $logo ?></div>
	<div class=""><?php eval(mso_tmpl_prepare(mso_get_option('top1_block', getinfo('template'), ''))); ?></div>
</div>

<div class="menu-search flex flex-vcenter mar20-rl bg-gray800 flex-wrap-tablet">
	
	<div class="w100-tablet"><?php if ($fn = mso_fe('components/_menu/_menu.php')) require($fn); ?></div>
	
	<div class="">
		<form name="f_search" class="f_search" method="get">
			<input class="my-search my-search--hidden" type="search" name="s" id="sss" placeholder="<?= tf('Поиск...') ?>"><label class="label-search i-search icon-square bg-gray700 t-gray200 cursor-pointer" for="sss"></label>
		</form>
		<script> var searchForm = $(".f_search"); var searchInput = $(".my-search"); var searchLabel = $(".label-search"); searchForm.submit(function (e) { e.preventDefault(); window.location.href = "<?= getinfo('siteurl') ?>search/" + encodeURIComponent(searchInput.val()).replace(/%20/g, '+'); }); searchLabel.click(function (e) { if (searchInput.val() === "") { searchInput.toggleClass("my-search--hidden"); } else { e.preventDefault(); searchForm.submit(); } }); $(document).click(function(e) { if ( !$(e.target).hasClass("label-search") && !$(e.target).hasClass("my-search") && (searchInput.val() === "") ) { searchInput.addClass("my-search--hidden"); } }); </script>
	</div>
</div>
