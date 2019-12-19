<?php
use Migrations\AbstractSeed;

/**
 * ContactOptions seed.
 */
class ContactOptionsSeed extends AbstractSeed
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
                'name' => 'Mobile',
                'code' => 'MOBILE',
                'order' => '1',
                'created_user_id' => '1',
                'created' => '2017-06-13 01:16:40',
            ],
            [
                'id' => '2',
                'name' => 'Phone',
                'code' => 'PHONE',
                'order' => '2',
                'created_user_id' => '1',
                'created' => '2017-06-13 01:16:40',
            ],
            [
                'id' => '3',
                'name' => 'Fax',
                'code' => 'FAX',
                'order' => '3',
                'created_user_id' => '1',
                'created' => '2017-06-13 01:16:40',
            ],
            [
                'id' => '4',
                'name' => 'Email',
                'code' => 'EMAIL',
                'order' => '4',
                'created_user_id' => '1',
                'created' => '2017-06-13 01:16:40',
            ],
            [
                'id' => '5',
                'name' => 'Other',
                'code' => 'OTHER',
                'order' => '6',
                'created_user_id' => '1',
                'created' => '2017-06-13 01:16:40',
            ],
            [
                'id' => '6',
                'name' => 'Emergency',
                'code' => 'EMERGENCY',
                'order' => '5',
                'created_user_id' => '1',
                'created' => '2017-06-13 01:16:40',
            ],
        ];

        $table = $this->table('contact_options');
        $table->insert($data)->save();
    }
}
