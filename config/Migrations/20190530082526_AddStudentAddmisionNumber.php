<?php
use Migrations\AbstractMigration;

class AddStudentAddmisionNumber extends AbstractMigration
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
        $table1 = $this->table('institution_student_admission');
        $table1
            ->addColumn('admission_id', 'integer', [
                'default' => 0,
                'null' => true,
            ])
            ->save();
        $table2 = $this->table('institution_students');
        $table2
            ->addColumn('admission_id', 'integer', [
                'default' => 0,
                'null' => true,
            ])
            ->save();

    }

    public function down()
    {
        $table1 = $this->table('institution_student_admission');
        $table1
            ->removeColumn('admission_id')
            ->save();

        $table1 = $this->table('institution_students');
        $table1
            ->removeColumn('admission_id')
            ->save();

    }
}
