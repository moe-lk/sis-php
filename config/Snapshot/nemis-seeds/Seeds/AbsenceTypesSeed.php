<?php
use Migrations\AbstractSeed;

/**
 * AbsenceTypes seed.
 */
class AbsenceTypesSeed extends AbstractSeed
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
                'code' => 'EXCUSED',
                'name' => 'Absence - Excused',
            ],
            [
                'id' => '2',
                'code' => 'UNEXCUSED',
                'name' => 'Absence - Unexcused',
            ],
            [
                'id' => '3',
                'code' => 'LATE',
                'name' => 'Late',
            ],
        ];

        $table = $this->table('absence_types');
        $table->insert($data)->save();
    }
}
