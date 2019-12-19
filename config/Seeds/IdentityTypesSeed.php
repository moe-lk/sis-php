<?php
use Migrations\AbstractSeed;

/**
 * IdentityTypes seed.
 */
class IdentityTypesSeed extends AbstractSeed
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
                'name' => 'Birth Certificate',
                'validation_pattern' => null,
                'order' => '1',
                'visible' => '1',
                'editable' => '1',
                'default' => '1',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-12-08 11:21:13',
            ]
        ];

        $table = $this->table('identity_types');
        $table->insert($data)->save();
    }
}
