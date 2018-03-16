<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 12/03/2018
 * Time: 10:33
 */

get_header();

while( have_posts() ) :
    the_post();
    the_content();
endwhile;

get_footer();