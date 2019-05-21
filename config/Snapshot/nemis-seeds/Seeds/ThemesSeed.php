<?php
use Migrations\AbstractSeed;
use Cake\Filesystem\File;
use Cake\Core\Configure;

/**
 * AbsenceTypes seed.
 */
class ThemesSeed extends AbstractSeed
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
        $table = $this->table('themes');
        $bgFile = Configure::read('schoolMode') ? 'school-login-bg.jpg' : 'core-login-bg.jpg';
        $loginBackground = new File(WWW_ROOT . 'img' . DS. 'default_images' .DS. $bgFile);
        $favicon = new File(WWW_ROOT . 'img' . DS .'default_images' .DS. 'favicon.ico');
        $logo = new File(WWW_ROOT . 'img' . DS .'default_images' .DS. 'oe-logo.png');
        $productName = 'OpenEMIS Core';
        $color = '6699CC';
        $copyright = '2012 - {{currentYear}} OpenEMIS';
        $data = [
            [
                'id' => '1',
                'name' => 'Application Name',
                'value' => null,
                'content' => null,
                'default_value' => $productName,
                'default_content' => null,
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-11-30 01:01:17',
            ],
            [
                'id' => '2',
                'name' => 'Login Page Image',
                'value' => null,
                'content' => null,
                'default_value' => $bgFile,
                'default_content' => $loginBackground->read(),
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-11-30 01:01:17',
            ],
            [
                'id' => '3',
                'name' => 'Logo',
                'value' => null,
                'content' => null,
                'default_value' => 'oe-logo.png',
                'default_content' => $logo->read(),
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-11-30 01:01:17',
            ],
            [
                'id' => '5',
                'name' => 'Colour',
                'value' => null,
                'content' => null,
                'default_value' => $color,
                'default_content' => null,
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-11-30 01:01:17',
            ],
            [
                'id' => '6',
                'name' => 'Copyright Notice In Footer',
                'value' => null,
                'content' => null,
                'default_value' => 'Copyright &copy; '. $copyright. '. All rights reserved.',
                'default_content' => null,
                'modified_user_id' => null,
                'modified' => null,
                'created_user_id' => '1',
                'created' => '2017-11-30 01:01:17',
            ],
        ];

        $table->insert($data)->save();
        $logo->close();
        $favicon->close();
        $loginBackground->close();
    }
}
