<?php
/*
 * Demograph - A demographic analysis plugin for e107
 *
 * Copyright (C) 2015 Patrick Weaver (http://trickmod.com/)
 * For additional information refer to the README.md file.
 *
 */
require_once('../../class2.php');
if (!getperms('P'))
{
	header('location:'.e_BASE.'index.php');
	exit;
}

class demograph_adminArea extends e_admin_dispatcher
{
	protected $modes = array(
		'main'	=> array(
			'controller' 	=> 'demograph_ui',
			'path' 			=> null,
			'ui' 			=> 'demograph_form_ui',
			'uipath' 		=> null
		),
	);

	protected $adminMenu = array(
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'
	);

	protected $menuTitle = 'demograph';
}

class demograph_ui extends e_admin_ui
{
	protected $pluginTitle		= 'Demograph';
	protected $pluginName		= 'demograph';
	protected $table			= '';
	protected $pid				= '';
	protected $perPage			= 10;
	protected $batchDelete		= true;
	protected $listOrder		= ' DESC';
	protected $fields 		= NULL;
	protected $fieldpref = array();

	protected $prefs = array(
		'visibility' => array(
			'title' => 'Visibility',
			'type' => 'userclass',
			'data' => 'str',
			'help' => ''
		),
		'animate' => array(
			'title' => 'Animate Charts?',
			'type' => 'boolean',
			'data' => 'str',
			'help' => '',
		),
		'birthday' => array(
			'title' => 'Birthday Chart Type',
			'type' => 'dropdown',
			'data' => 'str',
			'help' => '',
		),
		'country' => array(
			'title' => 'Country Chart Type',
			'type' => 'dropdown',
			'data' => 'str',
			'help' => '',
		),
		'gender' => array(
			'title' => 'Gender Chart Type',
			'type' => 'dropdown',
			'data' => 'str',
			'help' => '',
		),
		'language' => array(
			'title' => 'Language Chart Type',
			'type' => 'dropdown',
			'data' => 'str',
			'help' => '',
		),
		'location' => array(
			'title' => 'Location Chart Type',
			'type' => 'dropdown',
			'data' => 'str',
			'help' => '',
		),
		'timezone' => array(
			'title' => 'Timezone Chart Type',
			'type' => 'dropdown',
			'data' => 'str',
			'help' => '',
		),
	);

	public function init()
	{
		$this->chartTypes = array(
			'column' => 'Column',
			'line' => 'Line',
			'bar' => 'Bar',
			'pie' => 'Pie',
			'doughnut' => 'Doughnut',
			'spline' => 'Spline',
			'stepLine' => 'Step Line',
			'area' => 'Area',
			'splineArea' => 'Spline Area',
			'scatter' => 'Scatter/Point',
			'bubble' => 'Bubble',
			'rangeBar' => 'Range Bar',
			'rangeArea' => 'Range Area',
			'ohlc' => 'OHLC/Stock',
			'candlestick' => 'Candlestick',
			'dynamic' => 'Dynamic',
		);

		$this->prefs['birthday']['writeParms'] = $this->chartTypes;
		$this->prefs['country']['writeParms'] = $this->chartTypes;
		$this->prefs['gender']['writeParms'] = $this->chartTypes;
		$this->prefs['language']['writeParms'] = $this->chartTypes;
		$this->prefs['location']['writeParms'] = $this->chartTypes;
		$this->prefs['timezone']['writeParms'] = $this->chartTypes;
	}

	public function beforeCreate($new_data)
	{
		return $new_data;
	}

	public function afterCreate($new_data, $old_data, $id)
	{
	}

	public function onCreateError($new_data, $old_data)
	{
	}

	public function beforeUpdate($new_data, $old_data, $id)
	{
		return $new_data;
	}

	public function afterUpdate($new_data, $old_data, $id)
	{
	}

	public function onUpdateError($new_data, $old_data, $id)
	{
	}
}

class demograph_form_ui extends e_admin_form_ui
{
}

new demograph_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;
