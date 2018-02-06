CREATE TABLE `docs` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `date` int(11) unsigned NOT NULL default '0',
  `cid` int(11) unsigned NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `doc` text,
  PRIMARY KEY  (`id`),
  KEY `cid` (`cid`)
) TYPE=MyISAM;


CREATE TABLE `cats` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(250) NOT NULL default '',
  `notes` varchar(250) NOT NULL default '',
  `img` varchar(250) NOT NULL default '',
  `count` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

CREATE TABLE `downloads` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `date` int(11) unsigned NOT NULL default '0',
  `cid` int(11) unsigned NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `desc` varchar(250) NOT NULL default '',
  `image` varchar(250) NOT NULL default '',
  `url` varchar(250) NOT NULL default '',
  `notes` text,
  `views` int(11) unsigned NOT NULL default '0',
  `downloads` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `cid` (`cid`),
  KEY `views` (`views`),
  KEY `date` (`date`),
  KEY `downloads` (`downloads`)
) TYPE=MyISAM;


CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(250) NOT NULL default '',
  `email` varchar(250) NOT NULL default '',
  `message` text,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

CREATE TABLE `news` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `date` int(11) unsigned NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `cutted` text,
  `news` text,
  `views` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `views` (`views`),
  KEY `date` (`date`)
) TYPE=MyISAM;

CREATE TABLE `regimage` (
  `imagehash` varchar(32) NOT NULL default '',
  `imagestring` varchar(8) NOT NULL default '',
  `dateline` bigint(30) NOT NULL default '0'
) TYPE=MyISAM;