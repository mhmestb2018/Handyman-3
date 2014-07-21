<?php

require_once 'library/theme/class.theme.php';

$theme = new Wordpress\Themes\Tradesman\Theme();
$theme->run();



/*====================================*\
	THEME SETTINGS PANEL
\*====================================*/
if (!function_exists('optionsframework_init'))
{
    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/library/options-framework/');
    require_once dirname( __FILE__ ) . '/library/options-framework/options-framework.php';
}

/* End of file functions.php */
/* Location: ./wp-content/themes/%THEMEFOLDER%/functions.php */
