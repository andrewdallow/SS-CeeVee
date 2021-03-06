<?php
class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		$themeFolder = $this->ThemeDir();
                
                Requirements::css($themeFolder . "/css/default.css");
                Requirements::css($themeFolder . "/css/layout.css");
                Requirements::css($themeFolder . "/css/media-queries.css");
                Requirements::css($themeFolder . "/css/magnific-popup.css");
                Requirements::css($themeFolder . "/css/fontello/css/fontello.css");
                Requirements::css($themeFolder . "/css/font-awesome/css/font-awesome.min.css");
                Requirements::css($themeFolder . "/css/fonts.css");
                
                
                Requirements::javascript($themeFolder .  "/javascript/modernizr.js");
                Requirements::javascript("https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js");
                Requirements::javascript($themeFolder .  "/javascript/jquery-migrate-1.2.1.min.js");  
                
                $JSFiles = array(
                    $themeFolder . "/javascript/jquery.flexslider.js",
                    $themeFolder . "/javascript/waypoints.js",
                    $themeFolder . "/javascript/jquery.fittext.js",
                    $themeFolder . "/javascript/magnific-popup.js",
                    $themeFolder . "/javascript/init.js"
                ); 
                
                Requirements::combine_files("combinedJS.js", $JSFiles);
	}

}
