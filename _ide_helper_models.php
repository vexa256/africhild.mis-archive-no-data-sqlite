<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Activities
 *
 * @property int $id
 * @property string $AID
 * @property string|null $Activity
 * @property int|null $Budget
 * @property string|null $status
 * @property string|null $Grant
 * @property string $ProgressStatus
 * @property string|null $StartDate
 * @property string|null $ActivityExpiry
 * @property int|null $ValidityMonths
 * @property string|null $StrategicObjectives
 * @property string|null $CriticalInformation
 * @property string|null $PID
 * @property string|null $DID
 * @property string|null $GID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $Year
 * @property string|null $Month
 * @method static \Illuminate\Database\Eloquent\Builder|Activities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activities query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereAID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereActivityExpiry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereCriticalInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereDID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereGID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereGrant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities wherePID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereProgressStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereStrategicObjectives($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereValidityMonths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereYear($value)
 */
	class Activities extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ActivityCost
 *
 * @property int $id
 * @property string $DID
 * @property string $GID
 * @property string $AID
 * @property string $CostID
 * @property string|null $BroadCategory
 * @property string|null $Units
 * @property int|null $Frequency
 * @property int|null $QuantityRequired
 * @property int|null $UnitCost
 * @property int|null $Subtotal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $Year
 * @property string|null $Month
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereAID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereBroadCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereCostID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereDID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereGID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereQuantityRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereUnitCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCost whereYear($value)
 */
	class ActivityCost extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ActivityCosts
 *
 * @property int $id
 * @property string $DID
 * @property string $GID
 * @property string $AID
 * @property string $CostID
 * @property string|null $BroadCategory
 * @property string|null $Units
 * @property int|null $Frequency
 * @property int|null $QuantityRequired
 * @property int|null $UnitCost
 * @property int|null $Subtotal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $Year
 * @property string|null $Month
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereAID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereBroadCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereCostID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereDID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereGID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereQuantityRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereUnitCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCosts whereYear($value)
 */
	class ActivityCosts extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Approvals
 *
 * @property int $id
 * @property string|null $ApprovalUniqueKey
 * @property string|null $AprovalUniqueKeytable
 * @property string|null $ApprovalUniqueKeyfield
 * @property string|null $ApprovalSubject
 * @property string $ApprovalStatus
 * @property string|null $ApproverEmpID
 * @property string|null $RequesterEmpID
 * @property string|null $DeclineMessage
 * @property string|null $ApprovalKeyID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals query()
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereApprovalKeyID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereApprovalSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereApprovalUniqueKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereApprovalUniqueKeyfield($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereApproverEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereAprovalUniqueKeytable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereDeclineMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereRequesterEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Approvals whereUpdatedAt($value)
 */
	class Approvals extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AssignLeaves
 *
 * @property int $id
 * @property string $LID
 * @property string $EmpID
 * @property int $Dayentitled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AssignLeaves newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignLeaves newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignLeaves query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignLeaves whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignLeaves whereDayentitled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignLeaves whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignLeaves whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignLeaves whereLID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignLeaves whereUpdatedAt($value)
 */
	class AssignLeaves extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Beneficiaries
 *
 * @property int $id
 * @property string $Description
 * @property string|null $BID
 * @property string|null $BenID
 * @property string|null $Benefit
 * @property string|null $StaffName
 * @property string|null $EmpID
 * @property string $Name
 * @property string $DateOfBirth
 * @property string $IdType
 * @property string $IdNumber
 * @property string $Gender
 * @property string $Relationship
 * @property string $PhoneNumber
 * @property string $CurrentAddress
 * @property string $PermanentAddress
 * @property string $Email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries query()
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereBID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereBenID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereBenefit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereCurrentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries wherePermanentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereStaffName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaries whereUpdatedAt($value)
 */
	class Beneficiaries extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BenefitAssigns
 *
 * @property int $id
 * @property string $BID
 * @property string $EmpID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitAssigns newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitAssigns newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitAssigns query()
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitAssigns whereBID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitAssigns whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitAssigns whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitAssigns whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitAssigns whereUpdatedAt($value)
 */
	class BenefitAssigns extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BenefitLogs
 *
 * @property int $id
 * @property string $Benefit
 * @property string $Description
 * @property int $Amount
 * @property string $BID
 * @property string $PayID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitLogs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitLogs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitLogs query()
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitLogs whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitLogs whereBID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitLogs whereBenefit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitLogs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitLogs whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitLogs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitLogs wherePayID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BenefitLogs whereUpdatedAt($value)
 */
	class BenefitLogs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BroadCategories
 *
 * @property int $id
 * @property string $BroadCategory
 * @property string $MeasurementUnits
 * @property string $CatID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BroadCategories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BroadCategories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BroadCategories query()
 * @method static \Illuminate\Database\Eloquent\Builder|BroadCategories whereBroadCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BroadCategories whereCatID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BroadCategories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BroadCategories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BroadCategories whereMeasurementUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BroadCategories whereUpdatedAt($value)
 */
	class BroadCategories extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CacheTrigger
 *
 * @property int $id
 * @property string $Status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CacheTrigger newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheTrigger newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheTrigger query()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheTrigger whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheTrigger whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheTrigger whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheTrigger whereUpdatedAt($value)
 */
	class CacheTrigger extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contractors
 *
 * @property int $id
 * @property string $ContactPerson
 * @property string $Contractor
 * @property string $HOD
 * @property string $PhoneNumber
 * @property string $Email
 * @property string $PermanentAddress
 * @property string $IdOrRegNumber
 * @property string|null $IDScan
 * @property string $Nationality
 * @property string $Expertise
 * @property string $ServiceRendered
 * @property string $Description
 * @property string|null $Category
 * @property string|null $RoleID
 * @property string|null $ReportsTo
 * @property string|null $ReportsToRoleID
 * @property string $Department
 * @property int $ProfessionalFees
 * @property string $EmpID
 * @property string $JoiningDate
 * @property string $ContractExpiry
 * @property string $BankName
 * @property string $BankBranch
 * @property string $AccountName
 * @property int $AccountNumber
 * @property int|null $MonthsToExpiry
 * @property string|null $TIN
 * @property string|null $StaffPhoto
 * @property string $PromotionStatus
 * @property string $RecordStatus
 * @property string $SoonExpiring
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereBankBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereContactPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereContractExpiry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereContractor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereExpertise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereHOD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereIDScan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereIdOrRegNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereJoiningDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereMonthsToExpiry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors wherePermanentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereProfessionalFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors wherePromotionStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereRecordStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereReportsTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereReportsToRoleID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereRoleID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereServiceRendered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereSoonExpiring($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereStaffPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereTIN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractors whereUpdatedAt($value)
 */
	class Contractors extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeductionAssigns
 *
 * @property int $id
 * @property string $DID
 * @property string $EmpID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionAssigns newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionAssigns newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionAssigns query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionAssigns whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionAssigns whereDID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionAssigns whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionAssigns whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionAssigns whereUpdatedAt($value)
 */
	class DeductionAssigns extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DeductionLogs
 *
 * @property int $id
 * @property string $Deduction
 * @property string $Description
 * @property int $Amount
 * @property string $DID
 * @property string $PayID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionLogs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionLogs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionLogs query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionLogs whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionLogs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionLogs whereDID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionLogs whereDeduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionLogs whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionLogs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionLogs wherePayID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeductionLogs whereUpdatedAt($value)
 */
	class DeductionLogs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Deductions
 *
 * @property int $id
 * @property string $Deduction
 * @property string $Description
 * @property int $Amount
 * @property string $DID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Deductions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deductions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deductions query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deductions whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deductions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deductions whereDID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deductions whereDeduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deductions whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deductions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deductions whereUpdatedAt($value)
 */
	class Deductions extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Donors
 *
 * @property int $id
 * @property string $Name
 * @property string $DID
 * @property string $Country
 * @property string $Description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $Category
 * @property string|null $ContactPerson
 * @property string|null $Email
 * @property string|null $Address
 * @property string|null $Phone
 * @method static \Illuminate\Database\Eloquent\Builder|Donors newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Donors newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Donors query()
 * @method static \Illuminate\Database\Eloquent\Builder|Donors whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donors whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donors whereContactPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donors whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donors whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donors whereDID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donors whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donors whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donors whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donors whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donors wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donors whereUpdatedAt($value)
 */
	class Donors extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GrantDocs
 *
 * @property int $id
 * @property string $GID
 * @property string $GrantName
 * @property string $DocumentCategory
 * @property string $DocumentTitle
 * @property string $Description
 * @property string|null $DocURL
 * @property string $DOCID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs query()
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs whereDOCID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs whereDocURL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs whereDocumentCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs whereDocumentTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs whereGID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs whereGrantName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GrantDocs whereUpdatedAt($value)
 */
	class GrantDocs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Grants
 *
 * @property int $id
 * @property string $GrantName
 * @property string $GrantCategory
 * @property int $OriginalAmount
 * @property string $GrantExpiry
 * @property string $status
 * @property int|null $ValidityMonths
 * @property string $OriginalCurrency
 * @property int $OriginalExchangeRate
 * @property int $AmountInUgx
 * @property string $GrantNumber
 * @property string $GID
 * @property string $DetailedNotes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $GrantStartDate
 * @property string|null $Donor
 * @property string|null $DID
 * @method static \Illuminate\Database\Eloquent\Builder|Grants newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grants newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grants query()
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereAmountInUgx($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereDID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereDetailedNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereDonor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereGID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereGrantCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereGrantExpiry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereGrantName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereGrantNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereGrantStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereOriginalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereOriginalCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereOriginalExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grants whereValidityMonths($value)
 */
	class Grants extends \Eloquent {}
}

namespace App\Models\HR{
/**
 * App\Models\HR\Departments
 *
 * @property int $id
 * @property string $DepartmentName
 * @property string $DeptID
 * @property string $Description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Departments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departments query()
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereDepartmentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereDeptID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departments whereUpdatedAt($value)
 */
	class Departments extends \Eloquent {}
}

namespace App\Models\HR{
/**
 * App\Models\HR\Employees
 *
 * @property int $id
 * @property string $StaffName
 * @property string $PhoneNumber
 * @property string $Email
 * @property string $LocalAddress
 * @property string $PermanentAddress
 * @property string $NIN
 * @property string|null $IDScan
 * @property string $Nationality
 * @property string $DOB
 * @property string $Designation
 * @property string|null $Gender
 * @property string|null $RoleID
 * @property string|null $ReportsTo
 * @property string|null $ReportsToRoleID
 * @property string $Department
 * @property int $MonthlySalary
 * @property string $EmpID
 * @property string|null $StaffCode
 * @property string $JoiningDate
 * @property string $ContractExpiry
 * @property string $BankName
 * @property string $BankBranch
 * @property string $AccountName
 * @property int $AccountNumber
 * @property string|null $TIN
 * @property string|null $BankCode
 * @property string|null $StaffPhoto
 * @property string $PromotionStatus
 * @property string $RecordStatus
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $SoonExpiring
 * @property int|null $MonthsToExpiry
 * @method static \Illuminate\Database\Eloquent\Builder|Employees newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employees newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employees query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereBankBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereBankCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereContractExpiry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereDOB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereIDScan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereJoiningDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereLocalAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereMonthlySalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereMonthsToExpiry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereNIN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees wherePermanentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees wherePromotionStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereRecordStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereReportsTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereReportsToRoleID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereRoleID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereSoonExpiring($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereStaffCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereStaffName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereStaffPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereTIN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employees whereUpdatedAt($value)
 */
	class Employees extends \Eloquent {}
}

namespace App\Models\HR{
/**
 * App\Models\HR\Roles
 *
 * @property int $id
 * @property string $Designation
 * @property string|null $DeptID
 * @property string $Description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $Department
 * @method static \Illuminate\Database\Eloquent\Builder|Roles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Roles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Roles query()
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereDeptID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereUpdatedAt($value)
 */
	class Roles extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Inventory
 *
 * @property int $id
 * @property string|null $CategoryID
 * @property string|null $Item
 * @property string|null $Description
 * @property string|null $Units
 * @property string|null $ItemID
 * @property int|null $AvailableQty
 * @property int|null $WarningQty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereAvailableQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereCategoryID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereItemID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventory whereWarningQty($value)
 */
	class Inventory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\InventoryCategory
 *
 * @property int $id
 * @property string|null $CategoryID
 * @property string|null $Category
 * @property string|null $Description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategory whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategory whereCategoryID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategory whereUpdatedAt($value)
 */
	class InventoryCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\InventoryCategoryLog
 *
 * @property int $id
 * @property string|null $CategoryID
 * @property string|null $Item
 * @property string|null $Description
 * @property string|null $Units
 * @property string|null $ItemID
 * @property int|null $AvailableQty
 * @property int|null $WarningQty
 * @property int|null $QtyDispensed
 * @property string|null $DispensedBy
 * @property string|null $DispensedTo
 * @property string|null $Explanation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereAvailableQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereCategoryID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereDispensedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereDispensedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereExplanation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereItemID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereQtyDispensed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryCategoryLog whereWarningQty($value)
 */
	class InventoryCategoryLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\InventoryItems
 *
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItems newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItems newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItems query()
 */
	class InventoryItems extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kins
 *
 * @property int $id
 * @property string $StaffName
 * @property string $EmpID
 * @property string $Name
 * @property string $DateOfBirth
 * @property string $IdType
 * @property string $IdNumber
 * @property string $Gender
 * @property string $Relationship
 * @property string $PhoneNumber
 * @property string $CurrentAddress
 * @property string $PermanentAddress
 * @property string $Email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Kins newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kins newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kins query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereCurrentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins wherePermanentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereStaffName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kins whereUpdatedAt($value)
 */
	class Kins extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LPO
 *
 * @property int $id
 * @property string $PurchaseOrderNo
 * @property string $Supplier
 * @property string $ProformaInvoiceNo
 * @property string $ProformaInvoiceDate
 * @property int|null $GrandTotal
 * @property string $Delivery
 * @property string $LPOID
 * @property string $VerifiedBy
 * @property string $AuthorizedBy
 * @property string $EDApprovalStatus
 * @property string|null $EDEmpID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LPO newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LPO newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LPO query()
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereAuthorizedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereEDApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereEDEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereLPOID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereProformaInvoiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereProformaInvoiceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO wherePurchaseOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPO whereVerifiedBy($value)
 */
	class LPO extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LPOCosts
 *
 * @property int $id
 * @property string $LPOID
 * @property string $Item
 * @property string $Description
 * @property string $Unit
 * @property string $Currency
 * @property int $Qty
 * @property int $UnitCost
 * @property int $TotalValue
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts query()
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts whereLPOID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts whereTotalValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts whereUnitCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LPOCosts whereUpdatedAt($value)
 */
	class LPOCosts extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LeaveApproval
 *
 * @property int $id
 * @property string $LID
 * @property string|null $EmpID
 * @property string|null $ApproverEmpID
 * @property string|null $Approver
 * @property string|null $status
 * @property string|null $ApproverMessage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval query()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval whereApprover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval whereApproverEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval whereApproverMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval whereLID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveApproval whereUpdatedAt($value)
 */
	class LeaveApproval extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LeaveTypes
 *
 * @property int $id
 * @property string $LeaveType
 * @property string $LID
 * @property string|null $Description
 * @property int $Days
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveTypes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveTypes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveTypes query()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveTypes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveTypes whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveTypes whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveTypes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveTypes whereLID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveTypes whereLeaveType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveTypes whereUpdatedAt($value)
 */
	class LeaveTypes extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Leaves
 *
 * @property int $id
 * @property string $LID
 * @property string $AppLetter
 * @property int|null $DaysAppliedFor
 * @property int|null $AssignedDays
 * @property int|null $SpentDays
 * @property int|null $UnusedDays
 * @property string|null $ApproverEmpID
 * @property string|null $Approver
 * @property string|null $status
 * @property string|null $ApproverMessage
 * @property string $StartDate
 * @property string $EndDate
 * @property string $ApprovalStatus
 * @property string $ValidityStatus
 * @property string $EmpID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $LeaveCategory
 * @property string|null $StaffName
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves query()
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereAppLetter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereApprover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereApproverEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereApproverMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereAssignedDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereDaysAppliedFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereLID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereLeaveCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereSpentDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereStaffName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereUnusedDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaves whereValidityStatus($value)
 */
	class Leaves extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MonthlyGrantBVA
 *
 * @property int $id
 * @property string|null $GID
 * @property string|null $DID
 * @property string|null $Grant
 * @property string|null $Month
 * @property string|null $Year
 * @property string|null $Budget
 * @property string|null $Actual
 * @property string|null $Variance
 * @property string|null $BurnRate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA query()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereActual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereBurnRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereDID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereGID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereGrant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereVariance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlyGrantBVA whereYear($value)
 */
	class MonthlyGrantBVA extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Noticeboard
 *
 * @property int $id
 * @property string|null $EmpID
 * @property string $Subject
 * @property string|null $Status
 * @property string $Description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $SenderName
 * @property string|null $HasAttachement
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard query()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard whereHasAttachement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard whereSenderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticeboard whereUpdatedAt($value)
 */
	class Noticeboard extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Notifications
 *
 * @property int $id
 * @property string $From
 * @property string $To
 * @property string $ReceiverEmail
 * @property string $Subject
 * @property string $Message
 * @property string $ReadStatus
 * @property string $RecEmpID
 * @property string $SenderEmpID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications whereReadStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications whereRecEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications whereReceiverEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications whereSenderEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifications whereUpdatedAt($value)
 */
	class Notifications extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payroll
 *
 * @property int $id
 * @property string $EmpID
 * @property string $Month
 * @property string $Year
 * @property string $Description
 * @property int $Taxes
 * @property int $Deduction
 * @property int $Benefits
 * @property int $SalaryPaid
 * @property int $GrossSalary
 * @property string $PayID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereBenefits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereDeduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereGrossSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll wherePayID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereSalaryPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereTaxes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payroll whereYear($value)
 */
	class Payroll extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PayrollCache
 *
 * @property int $id
 * @property string $StaffName
 * @property string $StaffCode
 * @property int $NetSalary
 * @property int $GrossSalary
 * @property int $Deductions
 * @property int $Benefits
 * @property string $MonthPaid
 * @property string $CalendarYear
 * @property string $RecordDate
 * @property string|null $EmpID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache query()
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereBenefits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereCalendarYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereDeductions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereGrossSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereMonthPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereNetSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereRecordDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereStaffCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereStaffName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayrollCache whereUpdatedAt($value)
 */
	class PayrollCache extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Proforma
 *
 * @property int $id
 * @property string $ProfID
 * @property string $Supplier
 * @property string $SupID
 * @property string $Description
 * @property string $Notes
 * @property string|null $VerifiedBy
 * @property string|null $AuthorizedBy
 * @property string $EDApprovalStatus
 * @property string|null $EDEmpID
 * @property int|null $GrandTotal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma query()
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereAuthorizedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereEDApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereEDEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereProfID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereSupID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proforma whereVerifiedBy($value)
 */
	class Proforma extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProformaCosts
 *
 * @property int $id
 * @property string $ProfID
 * @property string $Item
 * @property string $SupID
 * @property string $Description
 * @property string $Unit
 * @property string $Currency
 * @property int $Qty
 * @property int $UnitCost
 * @property int $TotalValue
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereProfID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereSupID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereTotalValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereUnitCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProformaCosts whereUpdatedAt($value)
 */
	class ProformaCosts extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Projects
 *
 * @property int $id
 * @property string $PID
 * @property string $DID
 * @property string $GID
 * @property string|null $Grant
 * @property string|null $Donor
 * @property string $ProjectName
 * @property string $status
 * @property int|null $ValidityMonths
 * @property string $DetailedNotes
 * @property string $StartDate
 * @property string $ProjectExpiry
 * @property int $Budget
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Projects newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projects newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projects query()
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereDID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereDetailedNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereDonor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereGID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereGrant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects wherePID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereProjectExpiry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereProjectName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereValidityMonths($value)
 */
	class Projects extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Requisition
 *
 * @property int $id
 * @property string $ReqID
 * @property string $Title
 * @property string $CommentsAndObservations
 * @property string $Department
 * @property string $PreparedBy
 * @property string $ReviewedBy
 * @property string $ItemsRequiredByThisDate
 * @property string $FundingSource
 * @property string $JobCode
 * @property string $EDEmpID
 * @property string $HODEmpID
 * @property string $FinanceEmpID
 * @property string $GeneralApprovalStatus
 * @property string $EdApprovalStatus
 * @property string $HeadOfDepartmentApprovalStatus
 * @property string $FianceApproval
 * @property int $Amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereCommentsAndObservations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereEDEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereEdApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereFianceApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereFinanceEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereFundingSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereGeneralApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereHODEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereHeadOfDepartmentApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereItemsRequiredByThisDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereJobCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition wherePreparedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereReqID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereReviewedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Requisition whereUpdatedAt($value)
 */
	class Requisition extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RequisitionCosts
 *
 * @property int $id
 * @property string $ReqID
 * @property string $Item
 * @property string $Description
 * @property string $Unit
 * @property string $Currency
 * @property int $Qty
 * @property int $UnitCost
 * @property int $TotalValue
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts whereReqID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts whereTotalValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts whereUnitCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisitionCosts whereUpdatedAt($value)
 */
	class RequisitionCosts extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $Designation
 * @property string|null $DeptID
 * @property string $Description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $Department
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeptID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SalaryBenefits
 *
 * @property int $id
 * @property string $Benefit
 * @property string $Description
 * @property int $Amount
 * @property string $BID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryBenefits newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryBenefits newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryBenefits query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryBenefits whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryBenefits whereBID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryBenefits whereBenefit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryBenefits whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryBenefits whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryBenefits whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryBenefits whereUpdatedAt($value)
 */
	class SalaryBenefits extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StaffBenefits
 *
 * @property int $id
 * @property string $Benefit
 * @property string $Description
 * @property int $Amount
 * @property string $BID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StaffBenefits newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffBenefits newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffBenefits query()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffBenefits whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffBenefits whereBID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffBenefits whereBenefit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffBenefits whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffBenefits whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffBenefits whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffBenefits whereUpdatedAt($value)
 */
	class StaffBenefits extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StaffDocs
 *
 * @property int $id
 * @property string $EmpID
 * @property string $StaffName
 * @property string $Department
 * @property string $Designation
 * @property string $DocumentCategory
 * @property string $DocumentTitle
 * @property string $Description
 * @property string|null $DocURL
 * @property string $DOCID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs query()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereDOCID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereDocURL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereDocumentCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereDocumentTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereStaffName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffDocs whereUpdatedAt($value)
 */
	class StaffDocs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Supplier
 *
 * @property int $id
 * @property string $SupplierName
 * @property string $PhysicalAddress
 * @property string $Category
 * @property string $ServicesOrGoodsSupplied
 * @property string $EmailOne
 * @property string $EmailTwo
 * @property string $SupID
 * @property string $PhoneNumberOne
 * @property string $PhoneNumberTwo
 * @property string $VerifiedBy
 * @property string $ApprovedBy
 * @property string $PreparedBY
 * @property string $EDApprovalStatus
 * @property string|null $Website
 * @property string|null $Description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereEDApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereEmailOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereEmailTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier wherePhoneNumberOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier wherePhoneNumberTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier wherePhysicalAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier wherePreparedBY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereServicesOrGoodsSupplied($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereSupplierName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereVerifiedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereWebsite($value)
 */
	class Supplier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TaxAssigns
 *
 * @property int $id
 * @property string $TID
 * @property string $EmpID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TaxAssigns newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxAssigns newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxAssigns query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxAssigns whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxAssigns whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxAssigns whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxAssigns whereTID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxAssigns whereUpdatedAt($value)
 */
	class TaxAssigns extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TaxLogs
 *
 * @property int $id
 * @property string $Tax
 * @property string $Description
 * @property int $Percentage
 * @property string $TID
 * @property string $PayID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TaxLogs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxLogs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxLogs query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxLogs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxLogs whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxLogs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxLogs wherePayID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxLogs wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxLogs whereTID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxLogs whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxLogs whereUpdatedAt($value)
 */
	class TaxLogs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Taxes
 *
 * @property int $id
 * @property string $Tax
 * @property string $Description
 * @property int $Percentage
 * @property string $TID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Taxes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxes query()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxes whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxes wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxes whereTID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxes whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxes whereUpdatedAt($value)
 */
	class Taxes extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $role
 * @property string|null $EmpID
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmpID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

