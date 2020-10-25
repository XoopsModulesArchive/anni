<?php

include '../../mainfile.php';

require XOOPS_ROOT_PATH . '/include/old_functions.php';

function editanni()
{
    global $xoopsConfig, $xoopsUser, $xoopsDB, $xoopsLogger, $Default_Theme;

    require_once XOOPS_ROOT_PATH . '/header.php';

    OpenTable();

    echo "<h4 style='text-align:center;'>" . _AN_TITRE . "</h4><br><a href='../../userinfo.php?uid=" . $xoopsUser->getVar('uid') . "'>Profil</a>&nbsp;<span style='font-weight:bold;'>&raquo;&raquo;</span>&nbsp;" . _AN_EDITER . '<br><br>';

    CloseTable();

    echo '<br>';

    echo '<br>';

    OpenTable();

    echo '<form action="index.php" method="post">'

         . '<table width="40%" align=center>' . '<tr><td colspan="2"><font class="pn-normal"><b>' . _AN_ENTRER . '</b> : </font><br></td></tr> ';

    echo '<tr><td><font class="pn-normal">' . _AN_JOUR . ' : </font></td> ' . '<td><select name="jour">';

    for ($i = 1; $i <= 31; $i++) {
        echo '<option name="jour" value="' . $i . '" ';

        if (1 == $i) {
            echo 'selected';
        }

        echo '>' . $i . '</option>';
    }

    echo '</select></td></tr>';

    echo '<tr><td><font class="pn-normal">' . _AN_MOIS . ' : </font></td> ' . '<td><select name="mois">';

    for ($i = 1; $i <= 12; $i++) {
        echo '<option name="mois" value="' . $i . '" ';

        if (1 == $i) {
            echo 'selected';
        }

        echo '>' . $i . '</option>';
    }

    echo '</select></td></tr>';

    echo '<tr><td><font class="pn-normal">' . _AN_ANNEE . ' : </font></td> ' . '<td><select name="annee">';

    for ($i = 1950; $i <= 2002; $i++) {
        echo '<option name="annee" value="' . $i . '" ';

        if (1950 == $i) {
            echo 'selected';
        }

        echo '>' . $i . '</option>';
    }

    echo '</select></td></tr>'

         . '</table><br><br>';

    echo '<center><input type="hidden" name="uname" value="'
         . $xoopsUser->uname()
         . '">'
         . '<input type="hidden" name="uid" value="'
         . $xoopsUser->uid()
         . '">'
         . '<input type="hidden" name="op" value="saveanni">'
         . '<input type="submit" value="'
         . _AN_SAVE
         . '"></center>'
         . '</form>';

    CloseTable();

    include '../../footer.php';
}

function saveanni()
{
    global $xoopsUser, $xoopsDB, $uid, $uname, $jour, $mois, $annee;

    if ($xoopsUser) {
        $result = $GLOBALS['xoopsDB']->queryF('select count(*) from ' . $xoopsDB->prefix('users_anni') . " where uid='$uid'");

        $enregistrement = $GLOBALS['xoopsDB']->fetchBoth($result);

        if (1 != $enregistrement['count(*)']) {
            $GLOBALS['xoopsDB']->queryF('insert into ' . $xoopsDB->prefix('users_anni') . " values(\"$uid\",\"$uname\",\"$jour\",\"$mois\",\"$annee\")");
        } else {
            $GLOBALS['xoopsDB']->queryF('update ' . $xoopsDB->prefix('users_anni') . " set jour=\"$jour\",mois=\"$mois\",annee=\"$annee\" where uid=\"$uid\"");

            redirect_header(XOOPS_URL . '/', 3, _AN_DBUPDATED);

            exit();
        }

        //require_once XOOPS_ROOT_PATH."/user.php";
        //Header("Location: ../../user.php");
    }
}

if ('' == $op) {
    $op = 'editanni';
}
switch ($op) {
    case 'editanni':
        editanni();
        break;
    case 'saveanni':
        saveanni();
        break;
}
