<?php

namespace Examination\Model\Table;

use Cake\ORM\Table;
use ArrayObject;

use Cake\Core\Configure;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Request;
use Cake\Validation\Validator;
use Cake\Datasource\Exception\InvalidPrimaryKeyException;
use Cake\I18n\I18n;
use Cake\I18n\Date;
use Cake\ORM\ResultSet;
use Cake\Network\Session;
use Cake\Log\Log;
use Cake\Routing\Router;
use Cake\Datasource\ResultSetInterface;

use App\Model\Table\ControllerActionTable;
use App\Model\Traits\OptionsTrait;

class ExaminationCentresTable extends ControllerActionTable
{
    const ACADEMIC = 1;
    const NON_ACADEMIC = 2;
    
    public function initialize(array $config)
    {
        $this->table('examination_centres');
        $this->belongsTo('Institutions', ['className' => 'Institution.Institutions']);
        
        parent::initialize($config);

        $this->hasMany('ExaminationCentres', ['className' => 'Examination.ExaminationCentres', 'dependent' => true, 'cascadeCallbacks' => true]);
        $this->hasMany('ExaminationItemResults', ['className' => 'Examination.ExaminationItemResults', 'dependent' => true, 'cascadeCallbacks' => true]);

        $this->belongsToMany('ExaminationCentresExaminations', [
            'className' => 'Examination.ExaminationCentresExaminations',
            'joinTable' => 'examination_centres_examinations_institutions',
            'foreignKey' => 'institution_id',
            'targetForeignKey' => ['examination_centre_id', 'examination_id'],
            'through' => 'Examination.ExaminationCentresExaminationsInstitutions',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);

        $this->classificationOptions = [
            self::ACADEMIC => __('Academic Institution'),
            self::NON_ACADEMIC => __('Non-Academic Institution')
        ];
    }

    public function afterSave(Event $event, Entity $entity, ArrayObject $options)
    {
        $SecurityGroup = TableRegistry::get('Security.SystemGroups');
        $SecurityGroupAreas = TableRegistry::get('Security.SecurityGroupAreas');

        $dispatchTable = [];
        $dispatchTable[] = $SecurityGroup;
        $dispatchTable[] = $this->ExaminationCentres;
        $dispatchTable[] = $SecurityGroupAreas;

        foreach ($dispatchTable as $model) {
            $model->dispatchEvent('Model.Institutions.afterSave', [$entity], $this);
        }
    }

    public function findNotExamCentres(Query $query, array $options)
    {
        if (isset($options['academic_period_id'])) {
            $query
                ->leftJoinWith('ExaminationCentres', function ($q) use ($options) {
                    return $q
                        ->where(['ExaminationCentres.academic_period_id' => $options['academic_period_id']]);
                })
                ->where([
                    'ExaminationCentres.institution_id IS NULL'
                ])
                ;
            return $query;
        }
    }

    public function getNonAcademicConstant()
    {
        return self::NON_ACADEMIC;
    }

    public function getAcademicConstant()
    {
        return self::ACADEMIC;
    }
}