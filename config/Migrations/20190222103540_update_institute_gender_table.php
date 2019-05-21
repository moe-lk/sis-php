<?php

use Phinx\Migration\AbstractMigration;

class UpdateInstituteGenderTable extends AbstractMigration
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
        $this->execute("DROP TABLE IF EXISTS `institution_genders`;");
        $this->execute("CREATE TABLE `institution_genders` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(10) NOT NULL,
            `code` varchar(10) NOT NULL,
            `order` int(3) NOT NULL,
            `created_user_id` int(11) NOT NULL,
            `created` datetime NOT NULL,
            `national_code` varchar(45) DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;");
        $this->execute("LOCK TABLES `institution_genders` WRITE;");
        $this->execute("INSERT INTO `institution_genders` VALUES (1,'Mixed','X',1,1,'NOW()','Mixed'),(2,'Boys','M',2,1,'NOW()','Boys'),(3,'Girls','F',3,1,'NOW()','Girls');");
        $this->execute("UNLOCK TABLES;");
    }
}
