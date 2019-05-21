<?php

use Phinx\Migration\AbstractMigration;

class AddUsernamePasswordImportMappin extends AbstractMigration
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
        $this->execute("INSERT INTO `openemis`.`import_mapping` (`id`, `model`, `column_name`, `description`, `order`, `is_optional`, `foreign_key`) VALUES ('', 'User.Users', 'username', '', '17', '0', '0')");
        $this->execute("INSERT INTO `openemis`.`import_mapping` (`id`, `model`, `column_name`, `description`, `order`, `is_optional`, `foreign_key`) VALUES ('', 'User.Users', 'password', '', '18', '0', '0')");
    }
}
