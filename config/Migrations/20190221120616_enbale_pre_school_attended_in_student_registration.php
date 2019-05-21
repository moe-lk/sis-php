<?php

use Phinx\Migration\AbstractMigration;

class EnbalePreSchoolAttendedInStudentRegistration extends AbstractMigration
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
        $table1 = $this->table('institution_students');
        $table1
            ->addColumn('is_attended_pre_school', 'integer', [
                'default' => 0,
                'null' => false,
            ]);

    }

    public function down()
    {

        $table1 = $this->table('institution_students');
        $table1
            ->removeColumn('is_attended_pre_school', 'integer', [
                'default' => 0,
                'null' => false,
            ]);
    }
}
