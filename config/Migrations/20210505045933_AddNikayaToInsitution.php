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
        $table->addColumn('nikaya_type_id', 'integer', [
            'after' => 'institution_type_id',
            'default' => null,
            'null' => true
            ])
              ->save();
              
             // $refTable = $this->table('nikaya_details'); //  $refTable->addColumn('id', 'integer')
        $table->addForeignKey('nikaya_type_id', 'institutions', 'id', ['delete'=> 'RESTRICT', 'update'=> 'CASCADE'])
             ->save();

 
    }

    public function down(){
        $table = $this->table('institutions');
        $table->removeColumn('nikaya_type_id')
        ->save();

    }
}
