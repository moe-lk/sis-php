<?php

use Phinx\Migration\AbstractMigration;

class Pocor4614 extends AbstractMigration
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
        $this->table('institution_network_connectivities')
        ->addColumn('name', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ])
        ->addColumn('order', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => false,
        ])
        ->addColumn('visible', 'integer', [
            'default' => '1',
            'limit' => 1,
            'null' => false,
        ])
        ->addColumn('editable', 'integer', [
            'default' => '1',
            'limit' => 1,
            'null' => false,
        ])
        ->addColumn('default', 'integer', [
            'default' => '0',
            'limit' => 1,
            'null' => false,
        ])
        ->addColumn('international_code', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ])
        ->addColumn('national_code', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ])
        ->addColumn('modified_user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ])
        ->addColumn('modified', 'datetime', [
            'default' => null,
            'limit' => null,
            'null' => true,
        ])
        ->addColumn('created_user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
        ->addColumn('created', 'datetime', [
            'default' => null,
            'limit' => null,
            'null' => false,
        ])
        ->create();

    }

    public function down (){
        $this->execute('DROP TABLE IF EXISTS institution_network_connectivities');
    }
}
