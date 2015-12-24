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
					foreach($data as $item => $value)
						$output .= '{y: '.$value.', label: "'.$item.'"},';

					$output .= ']
				}]
			});
			'.$name.'.render();';

		return $output;
	}

	function getInfo($type)
	{
		$results = e107::getDb()->retrieve('user_extended', '*', $type.' IS NOT NULL', true);
		$data = array();

		foreach($results as $field)
		{
			if($type == 'user_birthday')
				$item = round((time() - strtotime($field['user_birthday'])) / 31557600);
			elseif($type == 'user_gender')
				$item = ($field[$type] == 'M' ? 'Male' : 'Female');
			else
				$item = $field[$type];

			if(array_key_exists($item, $data))
				$data = array_replace($data, array($item => $data[$item]+1));
			else
				$data[$item] = 1;

			unset($item);
		}

		return $data;
	}
}
