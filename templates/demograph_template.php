<?php
/*
 * Demograph - A demographic analysis plugin for e107
 *
 * Copyright (C) 2015 Patrick Weaver (http://trickmod.com/)
 * For additional information refer to the README.md file.
 *
 */
$DEMOGRAPH_TEMPLATE['page'] = '
<h2>User Age</h2>
{CHART: type=birthday}
<br />

<h2>Country</h2>
{CHART: type=country}
<br />

<h2>Gender</h2>
{CHART: type=gender}
<br />

<h2>Language</h2>
{CHART: type=language}
<br />

<h2>Location</h2>
{CHART: type=location}
<br />

<h2>Timezone</h2>
{CHART: type=timezone}
<br />

';
