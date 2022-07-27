<?php
/**
 * Keep Cart Plugin
 * Copyright C.J.Pinder 2009 (http://www.zen-unlocked.com)
 * Zen Cart German Specific
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: init_savecart_admin.php 2022-07-27 10:00:40Z webchills $
 */
 
if (!defined('IS_ADMIN_FLAG') || IS_ADMIN_FLAG !== true) {
    die('Illegal Access');
}

// -----
// Only update configuration when an admin is logged in.
//
if (!isset($_SESSION['admin_id'])) {
    return;
}

// -----
// If the plugin's configuration settings haven't yet been recorded in the database, do that
// now.
//
if (!defined('KEEP_CART_ENABLED')) {
    $db->Execute(
        "INSERT INTO " . TABLE_CONFIGURATION . "
            (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function)
         VALUES
            ('Keep Visitor\'s Cart?', 'KEEP_CART_ENABLED', 'False', 'Keep a copy of the visitor\'s cart in a cookie.', 15, 50, now(), NULL, 'zen_cfg_select_option(array(\'True\', \'False\'),'),

            ('Days Before Cart Expires', 'KEEP_CART_DURATION', '30', 'Number of days to keep a visitor\'s cart.', 15, 51,  now(), NULL, NULL),

            ('Keep Cart: Secret Key', 'KEEP_CART_SECRET', 'change me', 'Random characters to use as Keep Cart secret key.  <b>Note:</b> The storefront processing is disabled if this value is left as the default <code>change me</code>.', 15, 52, now(), NULL, NULL)"
    );
    
    $db->Execute (
        "REPLACE INTO " . TABLE_CONFIGURATION_LANGUAGE . " 
            (configuration_title, configuration_key, configuration_language_id, configuration_description, last_modified, date_added) 
         VALUES 
            ('Keep Cart - Besucherwarenkorb in Cookie speichern?', 'KEEP_CART_ENABLED', '43', 'Wollen Sie Keep Cart aktivieren und Besucherwarenkörbe in einem Cookie speichern?', now(), now())"
    );
    $db->Execute (
        "REPLACE INTO " . TABLE_CONFIGURATION_LANGUAGE . " 
            (configuration_title, configuration_key, configuration_language_id, configuration_description, last_modified, date_added) 
         VALUES 
            ('Keep Cart - Speicherdauer für Besucherwarenkorb', 'KEEP_CART_DURATION', '43', 'Anzahl der Tage, die der Besucherwarenkorb gespeichert werden soll.<br>Voreinstellung: 30', now(), now())"
    );
    $db->Execute (
        "REPLACE INTO " . TABLE_CONFIGURATION_LANGUAGE . " 
            (configuration_title, configuration_key, configuration_language_id, configuration_description, last_modified, date_added) 
         VALUES 
            ('Keep Cart - Secret Key', 'KEEP_CART_SECRET', '43', 'Ändern Sie diesen Wert auf eine zufällige Zeichenfolge Ihrer Wahl mit einer Länge von etwa 15-20 Zeichen.<br><b>Hinweis:</b> Keep Cart wird deaktiviert, wenn diese Einstellung nicht geändert und auf dem voreingestellten <code>change me</code> belassen wird!.<br>Dieser Secret Key ist eine wichtige Absicherung, um Manipulationen des Cookies zu verhindern.', now(), now())"
    );    
   
} else {
    if (version_compare(PHP_VERSION, '7.3.0', '<') && KEEP_CART_ENABLED === 'True') {
        $db->Execute(
            "UPDATE " . TABLE_CONFIGURATION . "
                SET configuration_value = 'False',
                    last_modified = now()
              WHERE configuration_key = 'KEEP_CART_ENABLED'
              LIMIT 1"
        );
        $messageStack->add("<em>Keep Cart</em> wurde deaktiviert, da dazu mindestens PHP 7.3.0 erforderlich ist.", 'error');
    }
}
