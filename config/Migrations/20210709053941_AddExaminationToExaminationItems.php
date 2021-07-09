<?php
use Migrations\AbstractMigration;

class AddExaminationToExaminationItems extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function down(){
        $table = $this->table('examination_students');
        $table->removeColumn('examination_id')
        ->save();

    }

    public function up()
    {   
        $table = $this->table('examination_students');
        $table->addColumn('examination_id', 'integer', [
            'after' => 'f_name',
            'default' => null,
            'null' => true
            ])
              ->save();
              
             // $refTable = $this->table('nikaya_details'); //  $refTable->addColumn('id', 'integer')
        $table->addForeignKey('examination_id', 'examination_students', 'id', ['delete'=> 'RESTRICT', 'update'=> 'CASCADE'])
             ->save();

             $this->execute("ALTER TABLE `examination_students` CHANGE `medium` `medium` CHAR(1) NULL DEFAULT NULL;");

 
    }

    
}
