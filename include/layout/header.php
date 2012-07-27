<?php 
/*------------------------------------------------------------------------------------------------------------------------

    Author: Sean Goresht
    www: https://seangoresht.com/
    github: https://github.com/srsgores

    twitter: http://twitter.com/S.Goresht

    Licensed under the GNU Public License

--------------------------------------------------------------------------------------------------------------------- */

defined('_JEXEC') or die;

/**
* header class
*/
class Header extends Layout
{
	private $title, $meta_data, $search, $css_files[], $local_javascript_files[], $cdn_javascript_files, $cdn_css_files;
	public function printHeader($title, $meta_data)
	{
		# code...
	}
	function __construct() //default constructor.  Override if you want.
	{
		parent::_construct();
		$params =& JComponentHelper::getParams('jquerymobileadministratortemplate');
		$this->$title = "Joomla jQuery Mobile Administration";
		$this->$search = false;
		$this->$cdn_javascript_files = new Array("jquery" --> "http://ajax.googleapis.com/ajax/libs/jquery/" . $params->get('jquery_version', '1.7.2'). '/jquery.min.js', "no-conflict" --> "/js/jquery.noconflict.js", "jquery-mobile" --> "http://code.jquery.com/mobile/1.1.0/jquery.mobile-" . $params->get('jquery_mobile_version', '1.1.0'). '.min.js');
		$this->local_javascript_files = new Array("modernizr" --> "js/modernizr");
		$this->$cdn_css_files = new Array("jquery-mobile" --> "http://code.jquery.com/mobile/1.1.0/jquery.mobile-". $params->get('jquery_mobile_version', '1.1.0'). '.min.css');
		$this->$css_files = new Array("")
	}
}

 ?>