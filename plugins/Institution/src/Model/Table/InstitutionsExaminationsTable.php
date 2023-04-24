<?php
namespace Institution\Model\Table;

use ArrayObject;
use Cake\ORM\Query;
use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use App\Model\Table\ControllerActionTable;
use App\Model\Table\AppTable;

class InstitutionsExaminationsTable extends AppTable 
{
    public function initialize(array $config)
    {
        $this->table('institutions_examinations');
        parent::initialize($config);
        $this->belongsTo('Institutions', ['className' => 'Institution.Institutions', 'foreignKey' => 'institution_id' ]);
        $this->belongsTo('Examinations', ['className' => 'Examination.Examinations', 'foreignKey' => 'examination_id' ]);
    }
}