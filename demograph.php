<?php
/*
 * Demograph - A demographic analysis plugin for e107
 *
 * Copyright (C) 2015 Patrick Weaver (http://trickmod.com/)
 * For additional information refer to the README.md file.
 *
 */
require_once('../../class2.php');
require_once(e_PLUGIN.'demograph/classes/_demograph.php');
$pref = e107::pref('demograph');
$sql = e107::getDb();
$ns = e107::getRender();
$dg = new Demograph;
e107::js('demograph', 'js/canvasjs.min.js', 'jquery');

e107::js('inline', '
	window.onload = function () {
		'.$dg->generateChart($pref['birthday'], $dg->getAges(), 'chart').'
	}
');

require_once(HEADERF);

$ns->tablerender('User Age', '<div id="chart" style="height: 300px; width: 100%;"></div>');
