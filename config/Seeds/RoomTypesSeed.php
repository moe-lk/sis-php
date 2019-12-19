<?php
use Migrations\AbstractSeed;

/**
 * RoomTypes seed.
 */
class RoomTypesSeed extends AbstractSeed
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
                'name' => 'Non-Classroom',
                'order' => '1',
                'visible' => '1',
                'editable' => '1',
                'default' => '0',
                'classification' => '0',
                'international_code' => NULL,
                'national_code' => NULL,
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '2',
                'created' => '2016-09-07 02:17:55',
            ],
            [
                'id' => '2',
                'name' => 'Classroom',
                'order' => '2',
                'visible' => '1',
                'editable' => '1',
                'default' => '1',
                'classification' => '1',
                'international_code' => NULL,
                'national_code' => NULL,
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '2',
                'created' => '2016-11-11 08:26:47',
            ],
        ];

        $table = $this->table('room_types');
        $table->insert($data)->save();
    }
}
