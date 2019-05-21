<?php
use Migrations\AbstractSeed;

/**
 * WorkflowStepsParams seed.
 */
class WorkflowStepsParamsSeed extends AbstractSeed
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
                'id' => '08af3916-4357-4724-aa2a-f89019d95ef8',
                'workflow_step_id' => '84',
                'name' => 'institution_owner',
                'value' => '1',
            ],
            [
                'id' => '0c44ad30-5852-4e5f-b725-d8d3bee762d5',
                'workflow_step_id' => '83',
                'name' => 'institution_owner',
                'value' => '1',
            ],
            [
                'id' => '11716567-d496-4d55-919e-b31098ea3a8f',
                'workflow_step_id' => '89',
                'name' => 'institution_owner',
                'value' => '2',
            ],
            [
                'id' => '1224ad1e-c6f1-4704-b7c4-a5607cd577d6',
                'workflow_step_id' => '88',
                'name' => 'institution_owner',
                'value' => '2',
            ],
            [
                'id' => '30e19a7d-fae5-4678-aa2b-76196bd09d80',
                'workflow_step_id' => '80',
                'name' => 'institution_owner',
                'value' => '1',
            ],
            [
                'id' => '5f7f2d9a-b334-41fe-bf11-35edb143117b',
                'workflow_step_id' => '90',
                'name' => 'institution_owner',
                'value' => '2',
            ],
            [
                'id' => '84fc6fb3-6543-4bfd-8bc5-bcad7af408aa',
                'workflow_step_id' => '81',
                'name' => 'institution_owner',
                'value' => '2',
            ],
            [
                'id' => '8f524298-6c2c-4803-a5c1-8ef13a7beb65',
                'workflow_step_id' => '85',
                'name' => 'institution_owner',
                'value' => '2',
            ],
            [
                'id' => 'c016d526-c373-4d07-a491-515fd6b2ee3a',
                'workflow_step_id' => '82',
                'name' => 'institution_owner',
                'value' => '1',
            ],
            [
                'id' => 'cb8a32f4-e1dd-4c7a-bb5c-c00f7d2571b5',
                'workflow_step_id' => '81',
                'name' => 'validate_approve',
                'value' => '1',
            ],
            [
                'id' => 'd5919add-4965-4a9e-8d60-d68a4134ddcd',
                'workflow_step_id' => '87',
                'name' => 'institution_owner',
                'value' => '1',
            ],
            [
                'id' => 'e28a0786-fe42-400a-a91b-922df4f9a5ed',
                'workflow_step_id' => '86',
                'name' => 'institution_owner',
                'value' => '2',
            ],
            [
                'id' => 'ee8aef5f-a66e-49d8-8ef7-31ff69531955',
                'workflow_step_id' => '87',
                'name' => 'validate_approve',
                'value' => '1',
            ],
            [
                'id' => 'f810044f-4d45-4f43-8a4a-fd3accaabe36',
                'workflow_step_id' => '79',
                'name' => 'institution_owner',
                'value' => '1',
            ],
        ];

        $table = $this->table('workflow_steps_params');
        $table->insert($data)->save();
    }
}
