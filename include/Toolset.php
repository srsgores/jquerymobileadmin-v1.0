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
 * Toolset class to perform common operations such as loading css, javascript, and content
 */
class Toolset
{
	private $params;
	private $css_files;
	private $doc;

	function __construct()
	{
		$this->$params =& JComponentHelper::getParams('jquerymobileadministratortemplate');
		$this->$css_files = $params->get('custom-css', '0');
		$this->$doc = JFactory::getDocument();
	}

	/*Import custom-defined CSS files.  CSS files must be placed in css/custom directory, or they will not be loaded!*/
	public function loadCustomCSS($css_files = null)
	{
		//Documented at http://php.net/manual/en/function.readdir.php
		if ($params->get('custom-css', '0') == "1")
		{
			if ($handle = opendir($tpath . '/custom-css'))
			{
				/* Loop over the directory. */
				while (false !== ($entry = readdir($handle)))
				{
					//Check to see that the file was indeed a css file
					$extension = pathinfo($entry, PATHINFO_EXTENSION);
					if ($extension == "css")
					{
						//Load the files if that's true
						$doc->addStyleSheet($tpath . '/custom-css/' . $entry);
					}
				}
				closedir($handle); //Always a good idea to close our directory (in terms of permissions)
			}
		}
	}

	public function loadCdnJavascript($cdn_javascript_files)
	{
		foreach ($cdn_javascript_files as $library => $url)
		{
			$doc->addScript($url);
		}
	}

	public function loadJavascript()
	{
		loadCdnJavascript();

	}
}

?>