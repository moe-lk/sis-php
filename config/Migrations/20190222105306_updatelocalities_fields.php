<?php

use Phinx\Migration\AbstractMigration;

class UpdatelocalitiesFields extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $this->execute("DROP TABLE IF EXISTS `institution_localities`;");
        $this->execute("CREATE TABLE `institution_localities` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(50) NOT NULL,
            `order` int(3) NOT NULL,
            `visible` int(1) NOT NULL DEFAULT '1',
            `editable` int(1) NOT NULL DEFAULT '1',
            `default` int(1) NOT NULL DEFAULT '0',
            `international_code` varchar(50) DEFAULT NULL,
            `national_code` varchar(50) DEFAULT NULL,
            `modified_user_id` int(11) DEFAULT NULL,
            `modified` datetime DEFAULT NULL,
            `created_user_id` int(11) NOT NULL,
            `created` datetime NOT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;");
        $this->execute("LOCK TABLES `institution_localities` WRITE;");
        $this->execute("INSERT INTO `institution_localities` VALUES (1,'Municipal Council',1,1,1,0,'','Municipal Council',1,'CURRENT_TIMESTAMP',2,'CURRENT_TIMESTAMP'),(2,'Urban Council',2,1,1,0,'','Urban Council',1,'CURRENT_TIMESTAMP',2,'CURRENT_TIMESTAMP'),(3,'Pradeshiya Sabha',3,1,1,0,'','Pradeshiya Sabha',NULL,NULL,1,'CURRENT_TIMESTAMP'),(4,'Municipal Council Estate',4,1,1,0,'','Municipal Council Estate',NULL,NULL,1,'CURRENT_TIMESTAMP'),(5,'Urban Council Estate',5,1,1,0,'','Urban Council Estate',NULL,NULL,1,'CURRENT_TIMESTAMP'),(6,'Pradeshiya Sabha Estate',6,1,1,0,'','Pradeshiya Sabha Estate',NULL,NULL,1,'CURRENT_TIMESTAMP');");
        $this->execute("UNLOCK TABLES;");
    }
}
