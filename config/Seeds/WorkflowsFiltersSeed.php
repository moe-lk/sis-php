<?php
use Migrations\AbstractSeed;

/**
 * WorkflowsFilters seed.
 */
class WorkflowsFiltersSeed extends AbstractSeed
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
                'id' => '1bd7b640-3c9a-4d29-9338-59e070457804',
                'workflow_id' => '14',
                'filter_id' => '20',
            ],
            [
                'id' => '2016d52e-d8cb-4b39-92cd-fb8d74de3392',
                'workflow_id' => '10',
                'filter_id' => '0',
            ],
            [
                'id' => '3d14b69d-da0d-46c4-bbc4-026840cf0777',
                'workflow_id' => '17',
                'filter_id' => '403',
            ],
            [
                'id' => '4ae014e0-7ace-11e5-90af-0025902f4ecc',
                'workflow_id' => '1',
                'filter_id' => '0',
            ],
            [
                'id' => '4ec31ed4-ec54-11e6-b8f2-525400b263eb',
                'workflow_id' => '11',
                'filter_id' => '0',
            ],
            [
                'id' => '68de0aac-ec55-11e6-b8f2-525400b263eb',
                'workflow_id' => '12',
                'filter_id' => '3',
            ],
            [
                'id' => '6b7a9861-ec55-11e6-b8f2-525400b263eb',
                'workflow_id' => '12',
                'filter_id' => '4',
            ],
            [
                'id' => '89e53112-10dd-4dee-885e-7fb51fe8f75f',
                'workflow_id' => '15',
                'filter_id' => '400',
            ],
            [
                'id' => 'f04c87ed-2f02-42bd-b086-792aaf7f7ba3',
                'workflow_id' => '16',
                'filter_id' => '405',
            ],
        ];

        $table = $this->table('workflows_filters');
        $table->insert($data)->save();
    }
}
