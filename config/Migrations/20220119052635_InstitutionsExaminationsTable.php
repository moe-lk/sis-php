<?php
use Migrations\AbstractMigration;

class InstitutionsExaminationsTable extends AbstractMigration
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
        $table = $this->table('institutions_examinations');

        $table->addColumn('institution_id', 'integer', [
            'default' => null,
            'null' => true
        ]);

        $table->addColumn('examination_id', 'integer', [
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

        

        $table->addForeignKey('institution_id', 'institutions', 'id', ['delete'=> 'RESTRICT', 'update'=> 'CASCADE']);
        $table->addForeignKey('examination_id', 'examinations', 'id', ['delete'=> 'RESTRICT', 'update'=> 'CASCADE']);
        $table->create();
    }
}
