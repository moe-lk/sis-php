<?php
use Migrations\AbstractSeed;

/**
 * StaffAppraisalTypes seed.
 */
class StaffAppraisalTypesSeed extends AbstractSeed
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
                'code' => 'SELF',
                'name' => 'Self',
            ],
            [
                'id' => '2',
                'code' => 'SUPERVISOR',
                'name' => 'Supervisor',
            ],
            [
                'id' => '3',
                'code' => 'PEER',
                'name' => 'Peer',
            ],
        ];

        $table = $this->table('staff_appraisal_types');
        $table->insert($data)->save();
    }
}
