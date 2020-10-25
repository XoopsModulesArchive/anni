<?php

include '../../mainfile.php';
require XOOPS_ROOT_PATH . '/include/old_functions.php';

global $xoopsConfig, $xoopsUser, $xoopsDB;
require XOOPS_ROOT_PATH . '/header.php';
$xoopsOption['show_rblock'] = 0;
echo "<center><table width='100%'><tr><td><br><br>";
OpenTable();
echo "<h4 style='text-align:center;'>Alle ";
echo _TITLEPLURAL;
echo '</h4></center>';
CloseTable();
$requete = 'select uid,uname,annee,mois,jour from ' . $xoopsDB->prefix('users_anni') . " order by 'uname'";
echo '<br><br>';
OpenTable();
$result = $GLOBALS['xoopsDB']->queryF($requete);
$nb = mysql_numrows($result);

if (0 != $nb) {
    echo '<center><table align=center>';

    echo '<td><b>';

    echo _NAME;

    echo '</b></td>';

    echo "<td align='center' ><b>";

    echo _BIRTHDAYDATE;

    echo '</b></td></tr>';

    while (false !== ($datensatz = $GLOBALS['xoopsDB']->fetchBoth($result))) {
        echo '<tr>';

        echo '<td><font class="pn-normal"><a href="' . $xoopsConfig['xoops_url'] . '/userinfo.php?uid=' . $datensatz['uid'] . '">' . $datensatz['uname'] . '</a></font></td>';

        if (($datensatz[jour] <= 9) and ($datensatz[mois] > 9)) {
            echo "<td align='center'><font class=\"pn-normal\">0$datensatz[jour].$datensatz[mois].$datensatz[annee]</font></td> ";
        } elseif (($datensatz[jour] > 9) and ($datensatz[mois] <= 9)) {
            echo "<td align='center'><font class=\"pn-normal\">$datensatz[jour].0$datensatz[mois].$datensatz[annee]</font></td> ";
        } elseif (($datensatz[jour] <= 9) and ($datensatz[mois] <= 9)) {
            echo "<td align='center'><font class=\"pn-normal\">0$datensatz[jour].0$datensatz[mois].$datensatz[annee]</font></td> ";
        } else {
            echo "<td align='center'><font class=\"pn-normal\">$datensatz[jour].$datensatz[mois].$datensatz[annee]</font></td> ";
        }

        echo '</tr>';
    }

    echo '</table></center>';
} else {
    echo _NOBIRTHDAYSAVED;
}
echo '</td></tr></table></center>';
CloseTable();

include '../../footer.php';
