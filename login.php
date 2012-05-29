<?php 
/*------------------------------------------------------------------------
# author    your name or company
# copyright Copyright (C) 2011 example.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.example.com
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die; 

// variables
$tpath = $this->baseurl.'/templates/'.$this->template;
$this->setGenerator(null);
$params =& JComponentHelper::getParams('jquerymobileadministratortemplate');
$pageclass = $params->get('pageclass_sfx');

?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- mobile viewport optimized -->
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/apple-touch-icon-57x57.png"> <!-- iphone, ipod, android -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/apple-touch-icon-72x72.png"> <!-- ipad -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/apple-touch-icon-114x114.png"> <!-- iphone retina -->
  <link href="<?php echo $tpath; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" /> <!-- favicon -->
  <link rel="stylesheet" href="<?php echo $tpath; ?>/css/print.css?v=1.0.0" type="text/css" /> <!-- stylesheet -->
  <script src="<?php echo $tpath; ?>js/modernizr.js"></script> <!-- put all javascripts at the bottom, accept of modernizr.js -->
</head>

<?php
// load sheets and scripts
$doc->addStyleSheet($tpath.'/css/template.css.php?v=1.0.0'); 
$doc->addScript($tpath.'/js/modernizr.js'); // <- this script must be in the head

/*Load jQuery Mobile and jQuery resources*/

/*echo "Params: ". $params;
echo "jQuery version: ". $params->get('jquery_version');
echo "jQuery mobile version: ". $params->get('jquery_mobile_version');

echo "pageclass: ". $params->get('pageclass_sfx');*/

//Load jQuery library first (needs to happen in order to load jQuery Mobile) from CDN
$doc->addScript("http://ajax.googleapis.com/ajax/libs/jquery/". $params->get('jquery_version', '1.7.2'). '/jquery.min.js');
//Turn on no-conflict mode for jQuery conflicting with MooTools
$doc->addScript($tpath.'/js/jquery.noconflict.js');
//Load jQuery Mobile version from CDN
$doc->addScript("http://code.jquery.com/mobile/1.1.0/jquery.mobile-". $params->get('jquery_mobile_version', '1.1.0'). '.min.js');
//Load jQuery Mobile stylesheet from CDN
$doc->addStyleSheet("http://code.jquery.com/mobile/1.1.0/jquery.mobile-". $params->get('jquery_mobile_version', '1.1.0'). '.min.css');

/*Import custom-defined CSS files.  CSS files must be placed in css/custom directory, or they will not be loaded!*/

//Documented at http://php.net/manual/en/function.readdir.php

if ($params->get('custom-css', '0') == "1")
{
  if ($handle = opendir($tpath.'/custom-css')) 
  {
  /* Loop over the directory. */
  while (false !== ($entry = readdir($handle))) 
  {
    //Check to see that the file was indeed a css file
    $extension = pathinfo($entry, PATHINFO_EXTENSION);
    if ($extension == "css")
    {
      //Load the files if that's true
      $doc->addStyleSheet($tpath.'/custom-css/' . $entry);
    }
  }
  closedir($handle); //Always a good idea to close our directory (in terms of permissions)
  }
}

/*unset scripts, put them into /js/template.js.php to minify http requests*/
unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);

?>
  
<body class="<?php echo $pageclass; ?>">
  <!--jQuery mobile device layout-->
  <div data-role="page" id="login">
      <div data-role="content">
        <h1>
          <?php echo JText::_('COM_LOGIN_JOOMLA_ADMINISTRATION_LOGIN') ?>
        </h1>
        <h2 class="subtitle"><a href="index.php"><?php echo $this->params->get('showSiteName') ? $app->getCfg('sitename'). " " . JText::_('JADMINISTRATION') : JText::_('JADMINISTRATION') ; ?></a></h2>
       <jdoc:include type="message" />
          <jdoc:include type="component" />
          <p><?php echo JText::_('COM_LOGIN_VALID') ?></p>
          <p><a href="<?php echo JURI::root(); ?>"><?php echo JText::_('COM_LOGIN_RETURN_TO_SITE_HOME_PAGE') ?></a></p>
          <h2>Alternate jQuery Planned Login</h2>
        <div data-role="fieldcontain">
          <fieldset data-role="controlgroup">
            <label for="textinput1">
              Username
            </label>
            <input id="textinput1" placeholder="Username" value="" type="text" />
          </fieldset>
        </div>
        <div data-role="fieldcontain">
          <fieldset data-role="controlgroup">
            <label for="textinput2">
              Password
            </label>
            <input id="textinput2" placeholder="Password" value="" type="text" />
          </fieldset>
        </div>
        <input type="submit" data-icon="forward" data-iconpos="right" value="Login" />
        <div style="width: 288px; height: 100px; position: relative; background-color: #fbfbfb; border: 1px solid #b8b8b8;">
          <img src="http://codiqa.com/static/images/v2/image.png" alt="image" style="position: absolute; top: 50%; left: 50%; margin-left: -16px; margin-top: -18px" />
        </div>
      </div>
    </div>
</body>

</html>
