<?php
use Migrations\AbstractSeed;

/**
 * InfrastructureLevels seed.
 */
class InfrastructureLevelsSeed extends AbstractSeed
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
                'code' => 'LAND',
                'name' => 'Land',
                'description' => '',
                'editable' => '0',
                'parent_id' => null,
                'lft' => '1',
                'rght' => '8',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '2',
                'created' => '1990-01-01 00:00:00',
            ],
            [
                'id' => '2',
                'code' => 'BUILDING',
                'name' => 'Building',
                'description' => '',
                'editable' => '0',
                'parent_id' => '1',
                'lft' => '2',
                'rght' => '7',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '2',
                'created' => '1990-01-01 00:00:00',
            ],
            [
                'id' => '3',
                'code' => 'FLOOR',
                'name' => 'Floor',
                'description' => '',
                'editable' => '0',
                'parent_id' => '2',
                'lft' => '3',
                'rght' => '6',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '2',
                'created' => '1990-01-01 00:00:00',
            ],
            [
                'id' => '4',
                'code' => 'ROOM',
                'name' => 'Room',
                'description' => '',
                'editable' => '0',
                'parent_id' => '3',
                'lft' => '4',
                'rght' => '5',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '2',
                'created' => '1990-01-01 00:00:00',
            ],
        ];

        $table = $this->table('infrastructure_levels');
        $table->insert($data)->save();
    }
}
