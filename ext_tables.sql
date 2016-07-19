#
# Table structure for table 'tx_hemodules_domain_model_modules'
#
CREATE TABLE tx_hemodules_domain_model_modules (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	additional text NOT NULL,
	description int(11) unsigned NOT NULL default '0',
	url varchar(255) DEFAULT '' NOT NULL,
	credits int(11) DEFAULT '0' NOT NULL,
	level int(11) DEFAULT '0' NOT NULL,
	semester int(11) DEFAULT '0' NOT NULL,
	studyprogram int(11) unsigned DEFAULT '0' NOT NULL,
	person int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_hetools_domain_model_studyprograms'
#
CREATE TABLE tx_hetools_domain_model_studyprograms (

	modules int(11) unsigned DEFAULT '0' NOT NULL,

	course tinyint(1) unsigned DEFAULT '0' NOT NULL,
	tx_extbase_type text,

);

#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (

	modules  int(11) unsigned DEFAULT '0' NOT NULL,

);
