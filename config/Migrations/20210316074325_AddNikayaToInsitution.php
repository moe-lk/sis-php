<?php
use Migrations\AbstractMigration;

class AddNikayaToInsitution extends AbstractMigration
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
        $table = $this->table('institutions');
        $table->addColumn('nikaya', 'string', [
            'after' => 'institution_type_id',
            'default' => null,
            ])
              ->save();
              
              $refTable = $this->table('nikaya_details');
              //  $refTable->addColumn('id', 'integer')
             $refTable->addForeignKey('nikaya_type_id', 'institution', 'id', ['delete'=> 'RESTRICT', 'update'=> 'CASCADE'])
             ->save();


    }

    public function down(){
        $table = $this->table('institutions');
        $table->removeColumn('nikaya')
        ->save();

    }
}
