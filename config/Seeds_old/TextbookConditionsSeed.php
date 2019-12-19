<?php
use Migrations\AbstractSeed;

/**
 * TextbookConditions seed.
 */
class TextbookConditionsSeed extends AbstractSeed
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
                'name' => 'New',
                'order' => '1',
                'visible' => '1',
                'editable' => '1',
                'default' => '0',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '2',
                'created' => '2016-11-29 20:51:21',
            ],
            [
                'id' => '2',
                'name' => 'Good',
                'order' => '2',
                'visible' => '1',
                'editable' => '1',
                'default' => '1',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '2',
                'created' => '2016-11-29 20:51:35',
            ],
            [
                'id' => '3',
                'name' => 'Poor',
                'order' => '3',
                'visible' => '1',
                'editable' => '1',
                'default' => '0',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '2',
                'created' => '2016-11-29 20:51:44',
            ],
            [
                'id' => '4',
                'name' => 'N/A',
                'order' => '4',
                'visible' => '1',
                'editable' => '1',
                'default' => '0',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => NULL,
                'modified' => NULL,
                'created_user_id' => '2',
                'created' => '2016-11-29 20:52:00',
            ],
        ];

        $table = $this->table('textbook_conditions');
        $table->insert($data)->save();
    }
}
