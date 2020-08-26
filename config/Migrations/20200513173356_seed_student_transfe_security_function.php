<?php

use Phinx\Migration\AbstractMigration;

class SeedStudentTransfeSecurityFunction extends AbstractMigration
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
    public function run()
    {
        $data = [
            [   
                'id' => 8004,
                'name' => 'Student Transfer In',
                'controller' => 'Institutions',
                'module' => 'Institutions',
                'category' => 'Students',
                'parent_id' => '1000',
                '_view' => 'StudentTransferIn.index|StudentTransferIn.view',
                '_edit' => NULL,
                '_add' => NULL,
                '_delete' => 'StudentTransferIn.remove',
                '_execute' => 'StudentTransferIn.add|StudentTransferIn.edit|StudentTransferIn.add',
                'order' => '31',
                'visible' => '1',
                'description' => NULL,
                'modified_user_id' => '2',
                'modified' => now(),
                'created_user_id' => '1',
                'created' => now(),
            ],
            [
                'id' => 8005,
                'name' => 'Student Transfer Out',
                'controller' => 'Institutions',
                'module' => 'Institutions',
                'category' => 'Students',
                'parent_id' => '1000',
                '_view' => 'StudentTransferOut.view',
                '_edit' => NULL,
                '_add' => NULL,
                '_delete' => NULL,
                '_execute' => 'StudentTransferOut.edit|StudentTransferOut.view',
                'order' => '32',
                'visible' => '1',
                'description' => NULL,
                'modified_user_id' => '2',
                'modified' => '2017-10-12 17:06:58',
                'created_user_id' => '1',
                'created' => '1990-01-01 00:00:00',
            ],
            [
                'id' => '1022',
                'name' => 'Transfer Request',
                'controller' => 'Institutions',
                'module' => 'Institutions',
                'category' => 'Students',
                'parent_id' => '1000',
                '_view' => 'TransferRequests.index|TransferRequests.view',
                '_edit' => NULL,
                '_add' => NULL,
                '_delete' => 'TransferRequests.remove',
                '_execute' => 'TransferRequests.add|TransferRequests.edit|Transfer.add',
                'order' => '31',
                'visible' => '1',
                'description' => NULL,
                'modified_user_id' => '2',
                'modified' => '2017-10-12 17:06:58',
                'created_user_id' => '1',
                'created' => '1990-01-01 00:00:00',
            ],
            [
                'id' => '1023',
                'name' => 'Transfer Approval',
                'controller' => 'Institutions',
                'module' => 'Institutions',
                'category' => 'Students',
                'parent_id' => '1000',
                '_view' => 'TransferApprovals.view',
                '_edit' => NULL,
                '_add' => NULL,
                '_delete' => NULL,
                '_execute' => 'TransferApprovals.edit|TransferApprovals.view',
                'order' => '32',
                'visible' => '1',
                'description' => NULL,
                'modified_user_id' => '2',
                'modified' => '2017-10-12 17:06:58',
                'created_user_id' => '1',
                'created' => '1990-01-01 00:00:00',
            ]
            ];

            // DB::table('security_functions')->whereIn('id',[1022,1023,8001,8002])->delete();
            // DB::table('security_functions')->insert($data);
            $table = $this->table('security_functions');
            // $table->
            $table->insert($data)->save();

    }
}
