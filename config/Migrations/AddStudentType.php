<?php
use Migrations\AbstractMigration;

class AddStudentType extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {

        /*
         * This migrations are for the creation of student type details. This table only has an id and a name
         * field. Further I have added a two columns, created and modified in order to get an idea
         * about the time details.
         *
         * The id of this table should be connected with the samanera details table as a foreign key
         * to this nikaya table.
         *
         * nikaya_details table
         * | id | name |
         * -------------
         * |    |      |
         *
         
         *
         * */

        $table = $this->table('student_type');

        $table->addColumn('name', 'string', [
           'default' => null,
           'null' => false
        ]);

      
        $table->addColumn('created', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true
        ]);

        $table->create();
    }

    public function down()
    {
        $this->dropTable('student_type');
    }
}
