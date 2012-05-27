<?php  
/*------------------------------------------------------------------------
# author    your name or company
# copyright Copyright © 2011 example.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.example.com
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die; 

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params =& JComponentHelper::getParams('jquerymobileadministratortemplate');
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

// load sheets and scripts
$doc->addStyleSheet($tpath.'/css/template.css.php?v=1.0.0'); 
$doc->addScript($tpath.'/js/modernizr.js'); // <- this script must be in the head

/*Load jQuery Mobile and jQuery resources*/

//Load jQuery library first (needs to happen in order to load jQuery Mobile) from CDN
$doc->addStyleSheet("http://ajax.googleapis.com/ajax/libs/jquery/". $this->$params->get('jquery_version'). 'min.css');
//Turn on no-conflict mode for jQuery conflicting with MooTools
$doc->addStyleSheet($tpath.'/js/jquery.noconflict.js');
//Load jQuery Mobile version from CDN
$doc->addStyleSheet("http://code.jquery.com/mobile/1.1.0/jquery.mobile-". $this->$params->get('jquery_mobile_version'). 'min.css');

/*Import custom-defined CSS files.  CSS files must be placed in css/custom directory, or they will not be loaded!*/

//Documented at http://php.net/manual/en/function.readdir.php
if ($handle = opendir($tpath.'/css/custom')) 
  {
    /* Loop over the directory. */
    while (false !== ($entry = readdir($handle))) 
    {
        //Check to see that the file was indeed a css file
        $extension = pathinfo($entry, PATHINFO_EXTENSION);
        if ($extension == "css")
        {
          //Load the files if that's true
          $doc->addStyleSheet($tpath.'/css/custom/' . $entry);
        }
    }
    closedir($handle); //Always a good idea to close our directory (in terms of permissions)
  }

/*unset scripts, put them into /js/template.js.php to minify http requests*/
unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <script type="text/javascript" src="<?php echo $tpath.'/js/template.js.php'; ?>"></script>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /> <!-- mobile viewport -->
  <link rel="stylesheet" media="only screen and (max-width: 768px)" href="<?php echo $tpath; ?>/css/tablet.css" type="text/css" />
  <link rel="stylesheet" media="only screen and (min-width: 320px) and (max-width: 480px)" href="<?php echo $tpath; ?>/css/phone.css" type="text/css" />
  <!--[if IEMobile]><link rel="stylesheet" media="screen" href="<?php echo $tpath; ?>/css/phone.css" type="text/css" /><![endif]--> <!-- iemobile -->
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/apple-touch-icon-57x57.png"> <!-- iphone, ipod, android -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/apple-touch-icon-72x72.png"> <!-- ipad -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/apple-touch-icon-114x114.png"> <!-- iphone retina -->
  <!--[if lte IE 8]>
    <style> 
      {behavior:url(<?php echo $tpath; ?>/js/PIE.htc);}
    </style>
  <![endif]-->
</head>
	
<body class="<?php echo $pageclass; ?>">
  <!--jQuery mobile device layout-->
  <div data-role="page" id="page1">
            <div data-role="content">
                <h1>
                    <?php echo JText::_('COM_LOGIN_JOOMLA_ADMINISTRATION_LOGIN') ?>
                </h1>
                <form action="">
                    &lt;form&gt;
                </form>
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
        <div data-role="page" id="page3">
            <div data-theme="a" data-role="header" data-position="fixed">
                <h3>
                    Dashboard
                </h3>
            </div>
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="" data-content-theme="">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Quick Links
                        </h3>
                        <ul data-role="listview" data-divider-theme="b" data-inset="true">
                            <li data-role="list-divider" role="heading">
                                Divider
                            </li>
                            <li data-theme="c">
                                <a href="#" data-transition="slide">
                                    Button
                                </a>
                            </li>
                            <li data-theme="c">
                                <a href="#page1" data-transition="slide">
                                    Button
                                </a>
                            </li>
                            <li data-theme="c">
                                <a href="#page1" data-transition="slide">
                                    Button
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Components
                        </h3>
                        <ul data-role="listview" data-divider-theme="b" data-inset="true">
                            <li data-role="list-divider" role="heading">
                                Divider
                            </li>
                            <li data-theme="c">
                                <a href="#" data-transition="slide">
                                    Button
                                </a>
                            </li>
                            <li data-theme="c">
                                <a href="#page1" data-transition="slide">
                                    Button
                                </a>
                            </li>
                            <li data-theme="c">
                                <a href="#page1" data-transition="slide">
                                    Button
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Extend
                        </h3>
                        <ul data-role="listview" data-divider-theme="b" data-inset="true">
                            <li data-role="list-divider" role="heading">
                                Divider
                            </li>
                            <li data-theme="c">
                                <a href="#" data-transition="slide">
                                    Button
                                </a>
                            </li>
                            <li data-theme="c">
                                <a href="#page1" data-transition="slide">
                                    Button
                                </a>
                            </li>
                            <li data-theme="c">
                                <a href="#page1" data-transition="slide">
                                    Button
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Configuration
                        </h3>
                        <ul data-role="listview" data-divider-theme="b" data-inset="true">
                            <li data-role="list-divider" role="heading">
                                Divider
                            </li>
                            <li data-theme="c">
                                <a href="#" data-transition="slide">
                                    Button
                                </a>
                            </li>
                            <li data-theme="c">
                                <a href="#page1" data-transition="slide">
                                    Button
                                </a>
                            </li>
                            <li data-theme="c">
                                <a href="#page1" data-transition="slide">
                                    Button
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <h1>
                    Statistics
                </h1>
                <div style="width: 288px; height: 100px; position: relative; background-color: #fbfbfb; border: 1px solid #b8b8b8;">
                    <img src="http://codiqa.com/static/images/v2/image.png" alt="image" style="position: absolute; top: 50%; left: 50%; margin-left: -16px; margin-top: -18px" />
                </div>
                <div style="width: 288px; height: 100px; position: relative; background-color: #fbfbfb; border: 1px solid #b8b8b8;">
                    <img src="http://codiqa.com/static/images/v2/image.png" alt="image" style="position: absolute; top: 50%; left: 50%; margin-left: -16px; margin-top: -18px" />
                </div>
                <div data-role="navbar" data-iconpos="top">
                    <ul>
                        <li>
                            <a href="#page1" data-theme="" data-icon="gear">
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="#page1" data-theme="" data-icon="refresh">
                                Preview Site
                            </a>
                        </li>
                        <li>
                            <a href="#page1" data-theme="" data-icon="info">
                                About
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
  <!--end jQuery mobile device layout -->
  <!--Normal Desktop layout -->
  <div id="overall">
    <div id="header">
      <div class="inheader">
        
      </div>
    </div>
    <div id="main">
      <div class="inmain">
        
      </div>
    </div>
    <div id="footer">
      <div class="infooter">
        
      </div>
    </div>
  </div>
  <jdoc:include type="modules" name="debug" />
</body>
<!--end normal desktop layout -->

</html>

