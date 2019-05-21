<?php

use Phinx\Migration\AbstractMigration;

class EnableSpecialEducationUnitOperating extends AbstractMigration
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
        $table1 = $this->table('institutions');
        $table1
            ->addColumn('is_special_education_unit_operating', 'integer', [
                'default' => 0,
                'null' => false,
            ]);

    }

    public function down()
    {

        $table1 = $this->table('institutions');
        $table1
            ->removeColumn('is_special_education_unit_operating', 'integer', [
                'default' => 0,
                'null' => false,
            ]);
    }
}
