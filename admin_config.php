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
	);

	public function init()
	{
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

	class demograph_form_ui extends e_admin_form_ui
	{
	}

	new demograph_adminArea();

	require_once(e_ADMIN."auth.php");
	e107::getAdminUI()->runPage();

	require_once(e_ADMIN."footer.php");
	exit;
