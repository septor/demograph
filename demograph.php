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
$pref	= e107::pref('demograph');
$sql	= e107::getDb();
$ns		= e107::getRender();
$dg		= new Demograph;
e107::js('demograph', 'js/canvasjs.min.js', 'jquery');

$birthdays = $sql->retrieve('user_extended', 'user_birthday', 'user_birthday IS NOT NULL', true);
$data = array();

foreach($birthdays as $birthday)
{
	$age = $dg->calculateAge($birthday['user_birthday']);
	if(array_key_exists($age, $data))
		$data = array_replace($data, array($age => $data[$age]+1));
	else
		$data[$age] = 1;
}

e107::js('inline', '
	window.onload = function () {
		'.$dg->generateChart('column', $data, 'chart').'
	}
');

require_once(HEADERF);

$text = '
<div id="chart" style="height: 300px; width: 100%;"></div>
';

$ns->tablerender('User Age', $text);
