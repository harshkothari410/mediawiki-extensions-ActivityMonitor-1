<?php
/**
 * SpecialPage for ActivityMonitor extension
 *
 * @file
 * @ingroup Extensions
 */

class SpecialActivityMonitor extends SpecialPage {
	public function __construct() {
		parent::__construct( 'ActivityMonitor' );
	}

	/**
	 * Shows the page to the user.
	 * @param string $sub: The subpage string argument (if any).
	 *  [[Special:ActivityMonitor/subpage]].
	 */
	public function execute( $sub ) {
		global $wgActivityMonitorRCStreamUrl;
		$out = $this->getOutput();

		$out->setPageTitle( $this->msg( 'activitymonitor' ) );

		if ( $wgActivityMonitorRCStreamUrl ) {
			$out->addHtml( '<div id="mw-activitymonitor-feed"></div>' );

			$out->addJsConfigVars( 'wgActivityMonitorRCStreamUrl', $wgActivityMonitorRCStreamUrl );

			$out->addModules( array( 'ext.ActivityMonitor.core' ) );
		}
		else{
			$out->addHtml( $this->msg( 'activitymonitor-configerror-msg' ) );
		}
	}
}
