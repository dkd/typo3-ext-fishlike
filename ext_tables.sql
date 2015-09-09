#
# Table structure for table 'tx_fishlike_like'
#
CREATE TABLE tx_fishlike_like (
    uid int(11) NOT NULL auto_increment,
    item_type varchar(255) DEFAULT '' NOT NULL,
    item_uid int(11) NOT NULL DEFAULT 0,
    counter  int(11) NOT NULL DEFAULT 0,
    PRIMARY KEY (uid),
    KEY processed (processed),
    KEY item_uuid (item_type,item_uuid)
) ENGINE=InnoDB;
