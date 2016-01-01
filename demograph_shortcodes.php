<?php
/*
 * Demograph - A demographic analysis plugin for e107
 *
 * Copyright (C) 2015 Patrick Weaver (http://trickmod.com/)
 * For additional information refer to the README.md file.
 *
 */
class demograph_shortcodes extends e_shortcode
{
	public $chartTypes;

	function __construct()
	{
		$this->chartTypes = array('birthday', 'country', 'gender', 'language', 'location', 'timezone');
	}

	function sc_chart($parm)
	{
		$width = (isset($parm['width'] ? $parm['width'] : '100%');
		$height = (isset($parm['height'] ? $parm['height'] : '300px');

		if(in_array($parm['type'], $this->chartTypes))
			$output = '<div id="'.$parm['type'].'" style="height:'.$height.'; width:'.$width.';"></div>';

		return $output;
	}
}
