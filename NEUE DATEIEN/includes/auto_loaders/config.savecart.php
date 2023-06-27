<?php
/**
 * Keep Cart Plugin
 * Copyright C.J.Pinder 2009 (http://www.zen-unlocked.com)
 *
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: config.savecart.php 2023-06-27 08:48:40Z webchills $
*/

$autoLoadConfig[90][] = ['autoType'=>'class', 'loadFile'=>'observers/class.savecart.php'];
$autoLoadConfig[90][] = ['autoType'=>'classInstantiate','className'=>'save_cart','objectName'=>'save_cart'];
