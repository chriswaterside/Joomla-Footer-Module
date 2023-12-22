<?php

/**
 * @module	MY Footer
 * @author	Chris Vaughan
 * @website	cevsystems.co.uk
 * @copyright	Copyright (C) 2023 Chris Vaughan <chris@cevsystems.co.uk>. All rights reserved.
 * @license	http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined( "_JEXEC" ) or die( "Restricted access" );
$class = $params->get('moduleclass_sfx');
if ($class === null) {
    $class = '';
}
$moduleclass_sfx = htmlspecialchars($class);

require(JModuleHelper::getLayoutPath('mod_myfooter', $params->get('layout', 'default')));

