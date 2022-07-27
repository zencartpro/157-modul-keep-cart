# 157-modul-keep-cart
Keep Cart für Zen Cart 1.5.7 deutsch

Hinweis: 
Freigegebene getestete Versionen für den Einsatz in Livesystemen ausschließlich unter Releases herunterladen:
* https://github.com/zencartpro/156-modul-keep-cart/releases

Keep Cart speichert eine Kopie des Inhalts des Warenkorbs eines nicht eingeloggten Besuchers in einem Cookie.
Dadurch bleibt der Warenkorb auch für noch nicht eingeloggte User erhalten.
Der Inhalt des Warenkorbs wird automatisch neu geladen, wenn der Besucher zurück in Ihren Shop kommt oder wenn seine Sitzung abläuft und neu gestartet wird.
Alle Artikel, die ausverkauft sind, deaktiviert oder gelöscht wurden, seit sie dem Warenkorb hinzugefügt wurden, werden entfernt, wenn der Warenkorb neu geladen wird.
Die Produktmengen im Warenkorb werden beim Neuladen automatisch angepasst, um Überverkauf zu verhindern.
Durch Verwendung eines admingesteuerten Secret Keys werden Manipulationen des Cookies auf dem Rechner der Besucher verhindert.
