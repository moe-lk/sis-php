<?php
use Migrations\AbstractMigration;

class AddSamaneraDetails extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        /*
         *
         * This migrations are for the creation of samanera details. This table only has an id,
         * a samanera_cert._number, date_of_ordi and a place_of_ordi. columns.
         * Further I have added a two columns, created and modified in order to get an idea
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
        * samanera_details table
         * | id | student_type_id|samanera_cert_number | nikaya_id* | date_of_ordi | place_of_ordi. |created | modified |
         * --------------------------------------------------------------------------------------------------------------
         * |    |                |                     |            |              |                |         |         |
         *
         * */

        $table = $this->table('samanera_details');

        $table->addColumn('security_user_id', 'integer', [
            'default' => null,
            'null' => false
               
         ]);

         $table->addIndex(['security_user_id'], ['unique' => true]);
         

         $table->addColumn('student_type_id', 'integer', [
            'default' => null,
            'null' => true
         ]);
        
        $table->addColumn('samanera_certification_number', 'string', [
            'default' => 'null',
            'null' => true
        ]);
        

        $table->addColumn('nikaya_type_id', 'integer', [
            'default' => null,
            'null' => true
         ]);

        
        $table->addColumn('date_of_ordination', 'date', [
            'default' => null,
            'null' => true
        ]);
        $table->addColumn('place_of_ordination', 'string', [
            'default' => null,
            'null' => true
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

       // $refTable = $this->table('security_users');
      //  $refTable->addColumn('id', 'integer')
        $table->addForeignKey('security_user_id', 'security_users', 'id', ['delete'=> 'RESTRICT', 'update'=> 'CASCADE'])
                 ->save();

        //$refTable = $this->table('student_type');
      //  $refTable->addColumn('id', 'integer')
        $table->addForeignKey('student_type_id', 'student_type', 'id', ['delete'=> 'RESTRICT', 'update'=> 'CASCADE'])
                 ->save();

         //$refTable = $this->table('nikaya_details');
                 //  $refTable->addColumn('id', 'integer')
         $table->addForeignKey('nikaya_type_id', 'nikaya_details', 'id', ['delete'=> 'RESTRICT', 'update'=> 'CASCADE'])
         
                ->save();
                           

    }

    public function down()
    {
        $this->dropTable('samanera_details');
    }
}
