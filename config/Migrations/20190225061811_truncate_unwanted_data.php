<?php

use Phinx\Migration\AbstractMigration;

class TruncateUnwantedData extends AbstractMigration
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
        $this->execute("TRUNCATE `openemis`.`institution_student_admission`;");
        $this->execute("TRUNCATE `openemis`.`institution_students`;");
        $this->execute("TRUNCATE `openemis`.`institution_class_grades`;");
        $this->execute("TRUNCATE `openemis`.`institution_class_students`;");
        $this->execute("TRUNCATE `openemis`.`institution_class_subjects`;");
        $this->execute("TRUNCATE `openemis`.`institutions`;");
        $this->execute("TRUNCATE `openemis`.`institution_history`;");
    }
    
}
