<?php
use Migrations\AbstractSeed;

/**
 * SecurityGroups seed.
 */
class SecurityGroupsSeed extends AbstractSeed
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
                'name' => 'Administrator Group',
                'modified_user_id' => '1',
                'modified' => '2017-12-22 10:56:32',
                'created_user_id' => '1',
                'created' => '2017-12-22 10:54:45',
            ]
        ];

        $table = $this->table('security_groups');
        $table->insert($data)->save();
    }
}
