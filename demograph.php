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

e107::js('demograph', 'js/canvasjs.min.js', 'jquery');
e107::js('inline', '
	// the below is dummy data for now
	window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer", {
			title:{
				text: "My First Chart in CanvasJS"
			},
			data: [
			{
				type: "line",
				dataPoints: [
					{ label: "apple",  y: 10  },
					{ label: "orange", y: 15  },
					{ label: "banana", y: 25  },
					{ label: "mango",  y: 30  },
					{ label: "grape",  y: 28  }
				]
			}
			]
		});
		chart.render();
	}
');

require_once(HEADERF);

$text = '<div id="chartContainer" style="height: 300px; width: 100%;"></div>';

$ns->tablerender('Demograph', $text);
