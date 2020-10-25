<?php

function b_anni_show()
{
    global $xoopsConfig, $xoopsUser, $xoopsDB;

    $block = [];

    $block['title'] = _TITLE;

    $jour = date('j');

    $mois = date('n');

    $annee = date('Y');

    $requete = 'select * from ' . $xoopsDB->prefix('users_anni') . " where jour like \"$jour\" and mois like \"$mois\"";

    $result = $GLOBALS['xoopsDB']->queryF($requete);

    $nb = mysql_numrows($result);

    if (0 != $nb) {
        $block['content'] = '';

        $block['content'] .= '<center><a href="' . $xoopsConfig['xoops_url'] . '/modules/anni/show_geb.php">Alle ';

        $block['content'] .= _TITLEPLURAL;

        $block['content'] .= '</a><br><br></center>';

        while (false !== ($enregistrement = $GLOBALS['xoopsDB']->fetchBoth($result))) {
            $block['content'] .= '<center><a href="' . $xoopsConfig['xoops_url'] . '/userinfo.php?uid=' . $enregistrement['uid'] . '">' . $enregistrement['uname'] . '</a> ';

            $block['content'] .= _TODAY;

            $block['content'] .= $annee - $enregistrement['annee'];

            $block['content'] .= "<a href=\"javascript:openWithSelfMain('" . XOOPS_URL . '/pmlite.php?send2=1&to_userid=' . $enregistrement['uid'] . "','pmlite',360,300);\"><img src=\"" . XOOPS_URL . '/images/icons/pm_small.gif" border="0" width="27" height="17">';

            $block['content'] .= '</a><br></center>';
        }

        return $block;
    }

    $block['content'] = '';

    $block['content'] .= '<center><a href="' . $xoopsConfig['xoops_url'] . '/modules/anni/show_geb.php">Alle ';

    $block['content'] .= _TITLEPLURAL;

    $block['content'] .= '</a><br><br>';

    $block['content'] .= _NOBIRTHDAY;

    $block['content'] .= '</center>';

    return $block;
}
