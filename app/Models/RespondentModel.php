<?php

namespace App\Models;

use CodeIgniter\Model;
use LDAP\Result;

class RespondentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'respondent_tbl';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'respondent_name',
        'gender',
        'age',
        'region',
        'service_feedback',
        'area_went',
        'created_at'

    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getRespondents($id)
    {
        return $this->select('respondent_name,
                gender, 
                age,
                region,
                service_feedback,
                client_type, 
                area_went,')
            // ->join('responses', 'respondent_tbl.id = responses.respondent_id')       

            ->where('respondent_tbl.id', $id)
            ->find($id);
    }

    public function getRespondentAnsweredSurvey($id)
    {
        return $this->select(

            'responses.response_value,
            responses.question_id,
            responses.respondent_id,
            responses.department_id,
            responses.created_at,           
            questions_tbl.question,
            department_tbl.department'
        )
            ->join('responses', 'respondent_tbl.id = responses.respondent_id')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('questions_tbl', 'responses.question_id = questions_tbl.id')
            ->where('respondent_tbl.id', $id)
            ->find($id);
    }
}
