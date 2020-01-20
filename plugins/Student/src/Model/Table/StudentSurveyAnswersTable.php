<?php
namespace Student\Model\Table;

use App\Model\Table\ControllerActionTable;;

class StudentSurveyAnswersTable extends ControllerActionTable {
	public function initialize(array $config) {
		$this->table('institution_student_survey_answers');

		parent::initialize($config);
//		$this->belongsTo('CustomFields', ['className' => 'Survey.SurveyQuestions', 'foreignKey' => 'survey_question_id']);
//		$this->belongsTo('CustomRecords', ['className' => 'Student.StudentSurveys', 'foreignKey' => 'institution_student_survey_id']);
	}
}
