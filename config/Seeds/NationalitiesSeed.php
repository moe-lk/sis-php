<?php

use Migrations\AbstractSeed;

class NationalitiesSeed extends AbstractSeed
{

    public function run()
    {
        $data = [
            [
                'id' => '3',
                'name' => 'Sinhalese',
                'order' => '3',
                'visible' => '1',
                'editable' => '1',
                'default' => '0',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-12-08 11:21:13',
            ],
            [
                'id' => '4',
                'name' => 'Sri Lankan Tamils',
                'order' => '4',
                'visible' => '1',
                'editable' => '1',
                'default' => '0',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-12-08 11:21:13',
            ],
            [
                'id' => '5',
                'name' => 'Sri Lankan Moors',
                'order' => '5',
                'visible' => '1',
                'editable' => '1',
                'default' => '0',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-12-08 11:21:13',
            ],
            [
                'id' => '6',
                'name' => 'Indian Tamils',
                'order' => '6',
                'visible' => '1',
                'editable' => '1',
                'default' => '0',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-12-08 11:21:13',
            ],
            [
                'id' => '7',
                'name' => 'Sri Lankan Malays',
                'order' => '7',
                'visible' => '1',
                'editable' => '1',
                'default' => '0',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-12-08 11:21:13',
            ],
            [
                'id' => '8',
                'name' => 'Burghers/Eurasian',
                'order' => '8',
                'visible' => '1',
                'editable' => '1',
                'default' => '0',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-12-08 11:21:13',
            ],
            [
                'id' => '9',
                'name' => 'Indian Moors',
                'order' => '9',
                'visible' => '1',
                'editable' => '1',
                'default' => '0',
                'international_code' => '',
                'national_code' => '',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-12-08 11:21:13',
            ]
        ];

        $table = $this->table('nationalities');
        $table->insert($data)->save();
    }

}