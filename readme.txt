=== Plugin Name ===
Contributors: Alex
Tags: box.net, plugins, rss, feed, api, music, podcasting, podcast
Requires at least: 2.0.2
Tested up to: 2.5.2
Stable tag: 1.0

Podcasting made simple. Just upload mp3's to box.net and you are done.

== Description ==

This is a little plugin that will help podcasters make a simple podcast page.
This plugin is based on the javascript soundmanager. 

You can find out more about the jsm at this adress: http://www.schillmania.com/projects/soundmanager2/

See this plugin in action at http://darkx-studios.com/?page_id=247

* Feel free to customize the plugin.
* Have in mind that this is the beta and I expect some bugs. If there is any problems contact me on dark2y@gmail.com. 

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `wp_trends.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Include this code in your sidebar.php or in your templates: 

`<?php 
GetBoxCast($feedUrl); 
?>`  

* The $feedUr is the path to your public box folder rss feed. ex: http://www.box.net/shared/cwczt68wks/rss.xml

You can configure the plugin's behavior from `config.php` locatet inside the plugins folder.

== Frequently Asked Questions ==

Q1: Will this feed have a bandwide limitation??
A1: Yes, if you have a free box.net account.


== Screenshots ==

1. Plugin implementation on my website.