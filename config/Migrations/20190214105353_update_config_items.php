<?php

use Phinx\Migration\AbstractMigration;

class UpdateConfigItems extends AbstractMigration
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
        $this->execute("UPDATE `openemis`.`config_items` SET `name`='ID Prefix', `type`='Auto Generated  ID' WHERE `id`='1003';");
        $this->execute("UPDATE `openemis`.`config_items` SET `value`='https://demo.sis.moe.gov.lk' WHERE `id`='201';");
        $this->execute("UPDATE `openemis`.`config_items` SET `value`='nsis.moe@gmail.com' WHERE `id`='200';");
        $this->execute("UPDATE `openemis`.`config_items` SET `value`='' WHERE `id`='116';");
        $this->execute("UPDATE `openemis`.`config_items` SET `value`='https://demo.sis.moe.gov.lk' WHERE `id`='56';");   
        $this->execute("UPDATE `openemis`.`config_items` SET `value`='nsis.moe@gmail.com' WHERE `id`='12';");
        $this->execute("UPDATE `openemis`.`config_items` SET `value`='Copyright &copy; year NEMIS - SIS. All rights reserved.' WHERE `id`='3';");
        $this->execute("UPDATE `openemis`.`translations` SET `en`='Copyright © 2015 NEMIS - SIS. All rights reserved.' WHERE `id`='1665';");

    }
}
