<?php
use Migrations\AbstractSeed;

/**
 * Workflows seed.
 */
class WorkflowsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'code' => 'SURVEY-1001',
                'name' => 'Institutions - Survey - General',
                'message' => NULL,
                'workflow_model_id' => '2',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2015-10-25 12:10:14',
            ],
            [
                'id' => '2',
                'code' => 'TRN-1001',
                'name' => 'Training Courses',
                'message' => NULL,
                'workflow_model_id' => '3',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2015-11-06 11:27:06',
            ],
            [
                'id' => '3',
                'code' => 'TRN-2001',
                'name' => 'Training Sessions',
                'message' => NULL,
                'workflow_model_id' => '4',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2015-11-06 11:27:06',
            ],
            [
                'id' => '4',
                'code' => 'TRN-3001',
                'name' => 'Training Results',
                'message' => NULL,
                'workflow_model_id' => '5',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2015-11-06 11:27:06',
            ],
            [
                'id' => '5',
                'code' => 'TRN-4001',
                'name' => 'Training Needs',
                'message' => NULL,
                'workflow_model_id' => '6',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2015-12-15 15:41:55',
            ],
            [
                'id' => '6',
                'code' => 'POSITION-1001',
                'name' => 'Positions',
                'message' => NULL,
                'workflow_model_id' => '7',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2016-02-12 18:29:36',
            ],
            [
                'id' => '7',
                'code' => 'CHANGE-IN-ASSIGNMENT-01',
                'name' => 'Change in Assignment',
                'message' => NULL,
                'workflow_model_id' => '8',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2016-04-15 10:45:45',
            ],
            [
                'id' => '8',
                'code' => 'TRN-5001',
                'name' => 'Training Applications',
                'message' => NULL,
                'workflow_model_id' => '10',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2016-11-08 07:25:04',
            ],
            [
                'id' => '9',
                'code' => 'VISIT-1001',
                'name' => 'Institutions - Visit Requests',
                'message' => NULL,
                'workflow_model_id' => '9',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2016-11-08 07:25:05',
            ],
            [
                'id' => '10',
                'code' => 'Leave',
                'name' => 'Leave Application Workflow',
                'message' => NULL,
                'workflow_model_id' => '1',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '2',
                'created' => '2016-11-16 16:12:09',
            ],
            [
                'id' => '11',
                'code' => 'STAFF-LICENSE-1001',
                'name' => 'Staff Licenses - General',
                'message' => NULL,
                'workflow_model_id' => '11',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2017-03-10 07:14:53',
            ],
            [
                'id' => '13',
                'code' => 'CASES-1001',
                'name' => 'Cases - General',
                'message' => NULL,
                'workflow_model_id' => '12',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2017-04-10 09:55:37',
            ],
            [
                'id' => '18',
                'code' => 'STAFF-TRANSFER-1001',
                'name' => 'Staff Transfer - Receiving',
                'message' => NULL,
                'workflow_model_id' => '13',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2017-11-15 14:51:18',
            ],
            [
                'id' => '19',
                'code' => 'STAFF-TRANSFER-2001',
                'name' => 'Staff Transfer - Sending',
                'message' => NULL,
                'workflow_model_id' => '14',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '1',
                'created' => '2017-11-15 14:51:18',
            ],
        ];

        $table = $this->table('workflows');
        $table->insert($data)->save();
    }
}
