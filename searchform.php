<form role="search" method="get" class="search-form relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'geeska' ); ?></span>
		<input type="search" class="search-field bg-input border border-border rounded-full pl-4 pr-10 py-1.5 text-sm focus:ring-ring focus:ring-2 focus:outline-none heading-font" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'geeska' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
		<span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'geeska' ); ?></span>
	</button>
</form>
