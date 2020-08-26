<?php
namespace App\Shell;

use Cake\I18n\Time;
use Cake\Console\Shell;
use Cake\ORM\TableRegistry;

/**
 * UpdateUserEmail shell command.
 */
class UpdateUserEmailShell extends Shell
{

    public function initialize() {
		parent::initialize();
	}

	public function main() {
		$Users = TableRegistry::get($this->args[0]);
		$primaryKey = $Users->primaryKey();
		$today = Time::now();

		while (true) {
            $email = $this->args[2];
            $id = $this->args[1];

            $Users->updateAll(
                ['email' => $email, 'modified_user_id' => 1, 'modified' => $today],
                [$primaryKey => $id]
            );
            break;
		}
	}
}
