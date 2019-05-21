<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AbsenceType Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 *
 * @property \App\Model\Entity\InstitutionStaffAbsence[] $institution_staff_absences
 * @property \App\Model\Entity\InstitutionStudentAbsenceDay[] $institution_student_absence_days
 * @property \App\Model\Entity\InstitutionStudentAbsence[] $institution_student_absences
 */
class AbsenceType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
