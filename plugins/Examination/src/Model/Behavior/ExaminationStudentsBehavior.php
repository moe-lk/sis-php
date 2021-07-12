<?php 
namespace Examination\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\I18n\Date;

class ClassStudentsBehavior extends Behavior {
	public function findStudentClasses(Query $query, array $options) {
		$model = $this->_table;
		$query
			->leftJoin(['ExaminationStudents' => 'examination_students'],
				[	
					'ExaminationStudents.st_no = '.$model->aliasField('st_no'),
                    'ExaminationStudents.f_name = '.$model->aliasField('f_name'),
					'ExaminationStudents.schoolid = '.$model->aliasField('schoolid'),
					'ExaminationStudents.gender = '.$model->aliasField('gender'),
					'ExaminationStudents.academic_period_id = '.$model->aliasField('academic_period_id'),
				]);

		if (array_key_exists('schoolid', $options)) {
			if (!empty($options['schoolid'])) {
				if ($options['schoolid'] != -1) {
					$query->where(['ExaminationStudents.schoolid' => $options['institution_class_id']]);
				} else {
					$query->where(['ExaminationStudents.schoolid IS NULL']);
				}
			} else {
				$query->where(['1 = 0']);
			}
		}
		return $query;
	}
}
