<?php

$PodSetup["PermitedFiles"] = array("mp3", "wma", "wav"); // The files that are permited to play.
$PodSetup["UpperCaseTitle"] = true; // Capitalize the first leters of the titles ex: Come To My Party.mp3 
$PodSetup["CutMP3"] = true; // If true, removes the mp3 from the files tale ex: Come To My Party.mp3 becomes Come To My Party
$PodSetup["PodCSS"] = BoxPath . "BoxCast.css";
$PodSetup["PodClass"] = "playlist darkx"; // Name of the class for the teme.
$PodSetup["JsFlashUrl"] = BoxPath . "includes/soundmanager2.swf"; // Path to swf file.
$PodSetup["JsPlayerUrl"] = BoxUrl . "includes/player.js"; // Path to player.js
$PodSetup["LoadDiv"] = "<h1>Populating, please wait...</h1>"; // Loading Message
$PodSetup["JsManagerUrl"] = BoxUrl . "includes/soundmanager2.js"; // Path to soundmanager component.

?>