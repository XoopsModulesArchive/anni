Salut voilà le système d'anniversaire à la Clubxtrem.net et à la Bahut.com
Original code par XtremDj et adapté par Lmaix.


INSTALLATION: 

1° étape :

-dézipper le tout et balancer ça à la racine de votre site.
-activer depuis l'admin et vérifier les acces des groupes.


3° étape : que si vous voulez avoir un lien dans le Menu du membre

-ouvrer le fichier system_blocks.php dans le répertoire modules/system/blocks
-dans la fonction b_system_user_show() vers la ligne 48 ajouter 


/////////apres cette ligne///////////// 

$block['content'] = "<strong><big>&middot;</big></strong>&nbsp;<a href='".XOOPS_URL."/user.php'>"._MB_SYSTEM_VACNT."</a><br />";

////////////////////////////////////////


///////////le code suivant/////////// 

$block['content'] = "<strong><big>&middot;</big></strong>&nbsp;<a href='".XOOPS_URL."/modules/anni/'>Anniversaire</a><br />";

////////////////////////////////////////

-et voilà c'est bon !



IMPORTANT:

Le problème de ce système est que vous allez avoir le bloc tout le temps
sur votre site même si il n'y a pas d'anniversaire le jour en question !

FEATURES:

Résolution de ce problème  et amélioration du design !

-------------------------------------------
Übersetzt von Nickel (www.99abi99.de)
Viel spass
nickel
-------------------------------------------

Installation:

1.Schritt

1. Datei entzippen und ins Module verzeichnis kopieren
2. Das Modul im Admin installieren und die Gruppenrechte setzen
3. WICHTIG: Die sql-tabelle muss du per hand in die Datenbank per phpmyadmin o.ä. erstellen
--------------------------------------------



3.Schritt (Wenn du einen Link im Mitglieder-Block haben möchtest

1.öffne die Datei system_blocks.php im Verzeichnis modules/system/blocks
2.unterhalb der Funktion b_system_user_show() in der Zeile 48 fügst du ein 


/////////nach dieser Zeile///////////// 

$block['content'] = "<strong><big>&middot;</big></strong>&nbsp;<a href='".XOOPS_URL."/user.php'>"._MB_SYSTEM_VACNT."</a><br />";

////////////////////////////////////////


///////////kommt diese zeile rein/////////// 

$block['content'] .= "<strong><big>&middot;</big></strong>&nbsp;<a href='".XOOPS_URL."/modules/anni/'>Geburtstag</a><br />";

////////////////////////////////////////


Für die Leute, die einen eigenen Hauptmenü-Block haben und keinen Link im Mitglieder-Block haben möchten gilt:
damit sich die Leute eintragen könne, muss ein Link im Hauptmenü anni/index.php existieren

Viel spass damit...

gruss nickel

nick@99abi99.de


