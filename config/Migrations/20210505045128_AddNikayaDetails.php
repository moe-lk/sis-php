<?php
use Migrations\AbstractMigration;

class AddNikayaDetails extends AbstractMigration
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
         * This migrations are for the creation of nikaya details. This table only has an id and a name
         * field. Further I have added a two columns, created and modified in order to get an idea
         * about the time details.
         *
         * The id of this table should be connected with the samanera details table as a foreign key
         * to this student type table.
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

        $table = $this->table('nikaya_details');

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

        $rows = [
            [
              
              'name'  => 'Nikaya type 01'
            ],
            [
              'name'  => 'Nikaya type 02'
            ],
            [
                'name'  => 'Nikaya type 03'
              ]
        ];

        // this is a handy shortcut
        $this->insert('nikaya_details', $rows);
    }

    public function down()
    {
        $this->dropTable('nikaya_details');
    }
}
