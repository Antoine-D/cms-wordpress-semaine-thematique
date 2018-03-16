<?php
/*
Plugin Name: Mon Plugin Perso
Plugin URI: http://monurl.com
Description: Mon premier plugin
Author: Moi
Author URI: http://moi.com
License: CC
Version: 0.1
*/

add_action('wp_footer', 'Add_Text');

function Add_Text(){
	//echo "<p>Quand le footer est chargé, monplugin affiche ce texte</p>";
}

function display_toss($param) {
    return '
		<h2 style="text-align:center;width:100%;">Inscription à notre Tirage au sort !</h2>
	';
}
//Ajoute le plugin au shortcode
add_shortcode('test', 'display_toss');

class Mon_Plugin
{
	
	public function __construct()
	{
		include_once plugin_dir_path(__FILE__).'/newsletter.php';
		register_activation_hook(__FILE__, array('Mon_Plugin', 'install'));
		register_uninstall_hook(__FILE__, array('Mon_Plugin', 'uninstall'));
		add_action('wp_loaded', array($this, 'save_email'));
	}

	public static function install() {
		global $wpdb;
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ma_newsletter_list (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL);");
	}

	public static function uninstall() {
		global $wpdb;
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ma_newsletter_list;");
	}

	public function save_email() {
		if(isset($_POST['ma_newsletter_email']) && !empty($_POST['ma_newsletter_email'])) {
			global $wpdb;
			$email = $_POST['ma_newsletter_email'];
			$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}ma_newsletter_list WHERE email='$email'");
				if (is_null($row)) {
					$wpdb->insert("{$wpdb->prefix}ma_newsletter_list", array('email' => $email));
				}
		}
	}

}
new Mon_Plugin();

?>