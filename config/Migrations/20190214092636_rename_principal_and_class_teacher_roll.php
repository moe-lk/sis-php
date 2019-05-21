<?php

use Phinx\Migration\AbstractMigration;

class RenamePrincipalAndClassTeacherRoll extends AbstractMigration
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
        $this->execute("UPDATE `openemis`.`security_roles` SET `name`='School Coordinator' WHERE `id`='4';");
        $this->execute("UPDATE `openemis`.`security_roles` SET `name`='Class Teacher' WHERE `id`='5';");
    }
}
