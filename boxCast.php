<?php 
/*
Plugin Name: WP-boxCast
Plugin URI: http://darkx-studios.com/?page_id=247
Description: Podcasting made simple. Just upload podt to box.net and you are done.
Author: Alexandru I Neacsu
Version: 1.0
Author URI: http://darkx-studios.com/

Based on javascript soundmanager and my other plugins. 

http://www.schillmania.com/projects/soundmanager2/

*/ 

define('BoxFolder', dirname(plugin_basename(__FILE__)));
define('BoxPath', 'wp-content/plugins/' . BoxFolder .'/');
define('BoxUrl', get_option('siteurl').'/wp-content/plugins/' . BoxFolder .'/');

include(BoxPath . "config.php");

if($_GET['MediaFeed']){
file_get_contents($PodSetup["PodcastServer"]);
}

if (!class_exists('lastRSS')) {
include_once(BoxPath . "includes/lastRSS.php"); 
}


function PraseBox($PodcastServer){

$PodcastRSS = new lastRSS; 

$rss->cache_dir = '';
$rss->cache_time = 0;
$rss->cp = 'US-ASCII';
$rss->date_format = 'l'; 

$podcast = $PodcastRSS->get($PodcastServer);

return $podcast['items'];
}

function GetBoxCast($BoxFeed){

global $PodSetup;

$PodItems = PraseBox($BoxFeed);

 foreach ($PodItems as $pod) {
  $PodTitle = $pod['title'];
  $PodLink = $pod['link'];
  $PodExt =strtolower(substr($PodLink, strrpos($PodLink, '.') + 1));
  if (in_array($PodExt, $PodSetup["PermitedFiles"])) {
    
	if($PodSetup["CutMP3"]){
	$PodTitle = substr($PodTitle,0,count($PodTitle) - 5);
	}
	
	if($PodSetup["UpperCaseTitle"]){
	$PodTitle = ucwords($PodTitle);
	}
	$PodElements[] = '<li><a href="' . $PodLink . '">' . $PodTitle . '</a></li>'; 
  }
 }
 
echo CreatePodInt($PodElements);

}

function CreatePodInt($PodElements){

global $PodSetup;

$PodContent = '
<link rel="stylesheet" type="text/css" href="' . $PodSetup["PodCSS"] . '" />
<script type="text/javascript" src="' . $PodSetup["JsManagerUrl"] . '"></script>
<script type="text/javascript" src="' . $PodSetup["JsPlayerUrl"] . '"></script>

<script language="javascript">
var pagePlayer = null;

soundManager.debugMode = (window.location.href.toString().match(/debug=1/i)?true:false); // enable with #debug=1 for example

soundManager.url = "'. $PodSetup["JsFlashUrl"] . '"; // path to movie

soundManager.onload = function() {
  pagePlayer = new PagePlayer();
  document.getElementById("podCast").style.visibility = "visible";
  document.getElementById("loader").parentNode.removeChild(document.getElementById("loader"));
}
</script>
 <div id="loader">' . $PodSetup["LoadDiv"] . '</div>
 <ul style="visibility:hidden" id="podCast" class="' . $PodSetup["PodClass"] . '">
';
$PodContent .= implode("\n",$PodElements);
$PodContent .= '  
</ul>
 
 <div id="control-template">
  <!-- control markup inserted dynamically after each link -->
  <div class="controls">
   <div class="statusbar">
    <div class="loading"></div>
     <div class="position"></div>
   </div>
  </div>
  <div class="timing">
   <div id="sm2_timing" class="timing-data">
    <span class="sm2_position">%s1</span> / <span class="sm2_total">%s2</span></div>
  </div>
 </div>

';

return $PodContent;
}

?>