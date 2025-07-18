<?php
/**
 * The sidebar containing the main widget area
 * @package Geeska_Magazine
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area lg:col-span-1 space-y-8">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
