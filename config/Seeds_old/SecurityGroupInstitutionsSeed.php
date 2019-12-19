<?php
use Migrations\AbstractSeed;

/**
 * SecurityGroupInstitutions seed.
 */
class SecurityGroupInstitutionsSeed extends AbstractSeed
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
                'institution_id' => '1',
                'created_user_id' => '1',
                'created' => '2017-12-22 10:56:32',
            ]
        ];

        $table = $this->table('security_group_institutions');
        $table->insert($data)->save();
    }
}
