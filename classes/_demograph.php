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

	function getAges()
	{
		$birthdays = e107::getDb()->retrieve('user_extended', 'user_birthday', 'user_birthday IS NOT NULL', true);
		$data = array();

		foreach($birthdays as $birthday)
		{
			$age = round((time() - strtotime($birthday['user_birthday'])) / 31557600);
			if(array_key_exists($age, $data))
				$data = array_replace($data, array($age => $data[$age]+1));
			else
				$data[$age] = 1;
		}

		return $data;
	}
}
