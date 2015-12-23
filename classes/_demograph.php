<?php
/*
 * Demograph - A demographic analysis plugin for e107
 *
 * Copyright (C) 2015 Patrick Weaver (http://trickmod.com/)
 * For additional information refer to the README.md file.
 *
 */
class Demograph
{
	function generateChart($type, $data, $name, $animate='true')
	{
		$output = 'var '.$name.' = new CanvasJS.Chart("'.$name.'", {
				animationEnabled: '.$animate.',
				data: [{
					type: "'.$type.'",
					dataPoints: [
					';
					foreach($data as $key => $value)
						$output .= '{y: '.$value.', label: "'.$key.'"},';

					$output .= ']
				}]
			});
			'.$name.'.render();';

		return $output;
	}

	function calculateAge($birthday)
	{
		return round((time() - strtotime($birthday)) / 31557600);
	}
}
