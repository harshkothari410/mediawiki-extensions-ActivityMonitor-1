<?php
/**
 * ActivityMonitor extension
 *
 * For more info see https://mediawiki.org/wiki/Extension:ActivityMonitor
 *
 * @file
 * @ingroup Extensions
 */

$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'ActivityMonitor',
	'author' => array(
		'Harsh Kothari',
		'Timo Tijhof',
	),
	'version'  => '0.1.0',
	'url' => 'https://www.mediawiki.org/wiki/Extension:ActivityMonitor',
	'descriptionmsg' => 'activitymonitor-desc',
	'license-name' => 'MIT',
);

/* Setup */

// Register files
$wgAutoloadClasses['ActivityMonitorHooks'] = __DIR__ . '/ActivityMonitor.hooks.php';
$wgAutoloadClasses['SpecialActivityMonitor'] = __DIR__ . '/specials/SpecialActivityMonitor.php';
$wgMessagesDirs['ActivityMonitor'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['ActivityMonitorAlias'] = __DIR__ . '/ActivityMonitor.i18n.alias.php';

// Register special pages
$wgSpecialPages['ActivityMonitor'] = 'SpecialActivityMonitor';
$wgSpecialPageGroups['ActivityMonitor'] = 'other';

// Register modules
$wgResourceModules['ext.ActivityMonitor.core'] = array(
	'scripts' => array(
		'modules/ext.ActivityMonitor.core.js',
	),
	'styles' => array(
		'modules/ext.ActivityMonitor.core.css',
	),
	'dependencies' => array(
		'ext.ActivityMonitor.socketio',
	),
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'ActivityMonitor',
);

// Register Socket IO module
$wgResourceModules['ext.ActivityMonitor.socketio'] = array(
	'scripts' => array(
		'lib/socketio.js',
	),
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'ActivityMonitor',
);
