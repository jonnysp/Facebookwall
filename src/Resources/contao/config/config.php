<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2018 Jonny Spitzner
 *
 * @license LGPL-3.0+
 */

array_insert($GLOBALS['BE_MOD']['content'], 100, array
(
	'facebookwall'	=> array('tables' => array('tl_facebookwall'))
));




/**
 * Front end modules
 */
array_insert($GLOBALS['TL_CTE'], 1, array
(
	'includes' => array
	(
		'facebookwall_viewer'    => 'FacebookwallViewer'
	)
));