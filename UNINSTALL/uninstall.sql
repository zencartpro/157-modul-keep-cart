#######################################################################################################
# Keep Cart UNINSTALL - 2022-07-27 - webchills
# NUR AUSFÜHREN FALLS SIE DAS MODUL VOLLSTÄNDIG ENTFERNEN WOLLEN!!!
########################################################################################################
DELETE FROM configuration WHERE configuration_key IN ('KEEP_CART_ENABLED','KEEP_CART_DURATION','KEEP_CART_SECRET');
DELETE FROM configuration_language WHERE configuration_key IN ('KEEP_CART_ENABLED','KEEP_CART_DURATION','KEEP_CART_SECRET');