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
		'.$dg->generateChart($pref['birthday'], $dg->getInfo('user_birthday'), 'birthday').'
		'.$dg->generateChart($pref['country'], $dg->getInfo('user_country'), 'country').'
		'.$dg->generateChart($pref['gender'], $dg->getInfo('user_gender'), 'gender').'
		'.$dg->generateChart($pref['language'], $dg->getInfo('user_language'), 'langauge').'
		'.$dg->generateChart($pref['location'], $dg->getInfo('user_location'), 'location').'
		'.$dg->generateChart($pref['timezone'], $dg->getInfo('user_timezone'), 'timezone').'
	}
');

require_once(HEADERF);

$ns->tablerender('User Age', '<div id="birthday" style="height: 300px; width: 100%;"></div>');
$ns->tablerender('Country', '<div id="country" style="height: 300px; width: 100%;"></div>');
$ns->tablerender('Gender', '<div id="gender" style="height: 300px; width: 100%;"></div>');
