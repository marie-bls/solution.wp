<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="form-search">
        <input class="hidden" value="" name="s" id="s" type="text" value="<?php the_search_query(); ?>">
        <button id="searchsubmit" type="submit" value=""><i class=" fa fa-search"></i></button>
    </div>
</form>

