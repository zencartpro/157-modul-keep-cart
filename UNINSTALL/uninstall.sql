#######################################################################################################
# Keep Cart UNINSTALL - 2022-07-27 - webchills
# NUR AUSF�HREN FALLS SIE DAS MODUL VOLLST�NDIG ENTFERNEN WOLLEN!!!
########################################################################################################
DELETE FROM configuration WHERE configuration_key IN ('KEEP_CART_ENABLED','KEEP_CART_DURATION','KEEP_CART_SECRET');
DELETE FROM configuration_language WHERE configuration_key IN ('KEEP_CART_ENABLED','KEEP_CART_DURATION','KEEP_CART_SECRET');