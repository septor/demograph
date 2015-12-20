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
	function getExtendedId($name)
	{
		return e107::getDb()->retrieve('user_extended_struct', 'user_extended_struct_id', "user_extended_struct_name='".$name."'");
	}
}
