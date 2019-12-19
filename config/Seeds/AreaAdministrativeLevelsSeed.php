<?php
use Migrations\AbstractSeed;

/**
 * AreaAdministrativeLevels seed.
 */
class AreaAdministrativeLevelsSeed extends AbstractSeed
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
                'name' => 'World',
                'level' => '-1',
                'area_administrative_id' => '0',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-06-20 00:00:00',
            ],
            [
                'id' => '2',
                'name' => 'Country',
                'level' => '0',
                'area_administrative_id' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '1990-01-01 00:00:00',
            ],
            [
                'id' => '3',
                'name' => 'Province',
                'level' => '1',
                'area_administrative_id' => '2',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '1990-01-01 00:00:00',
            ],
            [
                'id' => '4',
                'name' => 'Province',
                'level' => '2',
                'area_administrative_id' => '3',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '1990-01-01 00:00:00',
            ],
            [
                'id' => '5',
                'name' => 'District',
                'level' => '3',
                'area_administrative_id' => '4',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '1990-01-01 00:00:00',
            ],
            [
                'id' => '6',
                'name' => 'Zone',
                'level' => '4',
                'area_administrative_id' => '5',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '1990-01-01 00:00:00',
            ],
            [
                'id' => '7',
                'name' => 'Division',
                'level' => '5',
                'area_administrative_id' => '6',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '1990-01-01 00:00:00',
            ],
        ];

        $table = $this->table('area_administrative_levels');
        $table->insert($data)->save();
    }
}
