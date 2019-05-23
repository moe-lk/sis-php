<?php
use Migrations\AbstractSeed;

/**
 * TransportStatuses seed.
 */
class TransportStatusesSeed extends AbstractSeed
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
                'code' => 'OPERATING',
                'name' => 'Operating',
            ],
            [
                'id' => '2',
                'code' => 'NOT_OPERATING',
                'name' => 'Not Operating',
            ],
        ];

        $table = $this->table('transport_statuses');
        $table->insert($data)->save();
    }
}
