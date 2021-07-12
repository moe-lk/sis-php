<?php
use Migrations\AbstractMigration;

class DropAllWrongTransferTransitions extends AbstractMigration
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
        $this->execute("DELETE FROM workflow_transitions where workflow_model_id = 18;");
    }
}
