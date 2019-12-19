<?php
use Migrations\AbstractSeed;

/**
 * EducationLevelIsced seed.
 */
class EducationLevelIscedSeed extends AbstractSeed
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
                'name' => 'EARLY CHILDHOOD EDUCATION',
                'description' => '',
                'isced_level' => '0',
                'isced_version' => '2011',
                'order' => '1',
                'visible' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2013-02-06 15:07:10',
            ],
            [
                'id' => '2',
                'name' => 'PRIMARY',
                'description' => '',
                'isced_level' => '1',
                'isced_version' => '2011',
                'order' => '2',
                'visible' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2013-02-06 15:07:10',
            ],
            [
                'id' => '3',
                'name' => 'LOWER SECONDARY',
                'description' => '',
                'isced_level' => '2',
                'isced_version' => '2011',
                'order' => '3',
                'visible' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2013-02-06 15:07:10',
            ],
            [
                'id' => '4',
                'name' => 'UPPER SECONDARY',
                'description' => '',
                'isced_level' => '3',
                'isced_version' => '2011',
                'order' => '4',
                'visible' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2013-02-06 15:07:10',
            ],
            [
                'id' => '5',
                'name' => 'POST-SECONDARY NON-TERTIARY',
                'description' => '',
                'isced_level' => '4',
                'isced_version' => '2011',
                'order' => '5',
                'visible' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2013-02-06 15:07:10',
            ],
            [
                'id' => '6',
                'name' => 'SHORT-CYCLE TERTIARY',
                'description' => '',
                'isced_level' => '5',
                'isced_version' => '2011',
                'order' => '6',
                'visible' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2013-02-06 15:07:10',
            ],
            [
                'id' => '7',
                'name' => 'BACHELOR OR EQUIVALENT',
                'description' => '',
                'isced_level' => '6',
                'isced_version' => '2011',
                'order' => '7',
                'visible' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2013-02-06 15:07:10',
            ],
            [
                'id' => '8',
                'name' => 'MASTER OR EQUIVALENT',
                'description' => '',
                'isced_level' => '7',
                'isced_version' => '2011',
                'order' => '8',
                'visible' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2013-02-06 15:07:10',
            ],
            [
                'id' => '9',
                'name' => 'DOCTORAL OR EQUIVALENT',
                'description' => '',
                'isced_level' => '8',
                'isced_version' => '2011',
                'order' => '9',
                'visible' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2013-02-06 15:07:10',
            ],
            [
                'id' => '10',
                'name' => 'OTHERS',
                'description' => '',
                'isced_level' => '-1',
                'isced_version' => '2011',
                'order' => '10',
                'visible' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2013-02-06 15:07:10',
            ],
        ];

        $table = $this->table('education_level_isced');
        $table->insert($data)->save();
    }
}
