<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 12/03/2018
 * Time: 11:39
 */

add_action( 'init', 'theme_menu');

function theme_menu(){
    /*
     * premier param = id a choisir
     * ce qui va s'afficher dans le back
     */
    register_nav_menu('main_menu', 'Menu_principal'); //

}