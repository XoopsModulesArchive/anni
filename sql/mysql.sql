# phpMyAdmin MySQL-Dump
# version 2.2.2
# http://phpwizard.net/phpMyAdmin/
# http://phpmyadmin.sourceforge.net/ (download page)
#
# Host: localhost
# Generation Time: Feb 15, 2002 at 09:53 AM
# Server version: 3.23.36
# PHP Version: 4.0.6
# Database : `test`
# --------------------------------------------------------

# 
# Structure de la table `xoops_users_anni` 
# 
CREATE TABLE users_anni (
    uid   INT(11)     NOT NULL DEFAULT '0',
    uname VARCHAR(60) NOT NULL DEFAULT '',
    jour  CHAR(2)     NOT NULL DEFAULT '',
    mois  CHAR(2)     NOT NULL DEFAULT '',
    annee VARCHAR(4)  NOT NULL DEFAULT '',
    PRIMARY KEY (uid),
    KEY uid (uid)
)
    ENGINE = ISAM;


