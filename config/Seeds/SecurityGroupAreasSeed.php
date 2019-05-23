<?php
use Migrations\AbstractSeed;

/**
 * SecurityGroupAreas seed.
 */
class SecurityGroupAreasSeed extends AbstractSeed
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
                'security_group_id' => '1',
                'area_id' => '1',
                'created_user_id' => '1',
                'created' => '2017-12-22 10:54:45',
            ],
        ];

        $table = $this->table('security_group_areas');
        $table->insert($data)->save();
    }
}
