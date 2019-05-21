<?php
use Migrations\AbstractSeed;
use Cake\Filesystem\File;

/**
 * ConfigAttachments seed.
 */
class ConfigAttachmentsSeed extends AbstractSeed
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
        $file = new File(WWW_ROOT . 'img' . DS . 'kordit_logo.png');
        $data = [
            [
                'id' => '1',
                'name' => 'Kord IT',
                'description' => ' ',
                'type' => 'partner',
                'file_name' => 'kordit_logo.png',
                'file_content' => $file->read(),
                'order' => '1',
                'visible' => '1',
                'active' => '1',
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-12-13 00:00:00',
            ],
        ];

        $table = $this->table('config_attachments');
        $table->insert($data)->save();
        $file->close();
    }
}
