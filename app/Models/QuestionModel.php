<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'responses';
        protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'question_id',
        'response_value',
        'respondent_id',
        'department_id',
        'created_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getDepartmentData()
    {
        return $this->select('
                department_tbl.department, 
                COUNT(CASE WHEN responses.question_id = 1 THEN 1 END) AS total_responses,
                SUM(CASE WHEN responses.response_value = "Agree" THEN 1 ELSE 0 END)  AS agree_count ,
                SUM(CASE WHEN responses.response_value = "Disagree" THEN 1 ELSE 0 END) AS disagree_count,
                SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" THEN 1 ELSE 0 END) AS neither_agree_nor_disagree,
                SUM(CASE WHEN responses.response_value = "Strongly Agree" THEN 1 ELSE 0 END) AS strongly_agree_count,
                SUM(CASE WHEN responses.response_value = "Strongly Disagree" THEN 1 ELSE 0 END) AS strongly_disagree_count
            ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department');
    }

    public function getTodayCounted()
    {
        $todayStart = date('Y-m-d 00:00:00'); // Start of today
        $todayEnd = date('Y-m-d 23:59:59');   // End of today

        return $this->select('
        department_tbl.department, 
        COUNT(CASE WHEN responses.question_id = 1 THEN 1 END) AS total_responses,
        SUM(CASE WHEN responses.response_value = "Agree" THEN 1 ELSE 0 END)  AS agree_count ,
        SUM(CASE WHEN responses.response_value = "Disagree" THEN 1 ELSE 0 END) AS disagree_count,
        SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" THEN 1 ELSE 0 END) AS neither_agree_nor_disagree,
        SUM(CASE WHEN responses.response_value = "Strongly Agree" THEN 1 ELSE 0 END) AS strongly_agree_count,
        SUM(CASE WHEN responses.response_value = "Strongly Disagree" THEN 1 ELSE 0 END) AS strongly_disagree_count
    ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->where('responses.created_at >=', $todayStart)
            ->where('responses.created_at <=', $todayEnd)
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department')
            ->findAll();
    }

    public function getWeeklyCounted()
    {
        $oneWeekAgo = date('Y-m-d H:i:s', strtotime('-7 days')); // Calculate the date one week ago

        return $this->select('
        department_tbl.department, 
        COUNT(CASE WHEN responses.question_id = 1 THEN 1 END) AS total_responses,
        SUM(CASE WHEN responses.response_value = "Agree" THEN 1 ELSE 0 END)  AS agree_count ,
        SUM(CASE WHEN responses.response_value = "Disagree" THEN 1 ELSE 0 END) AS disagree_count,
        SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" THEN 1 ELSE 0 END) AS neither_agree_nor_disagree,
        SUM(CASE WHEN responses.response_value = "Strongly Agree" THEN 1 ELSE 0 END) AS strongly_agree_count,
        SUM(CASE WHEN responses.response_value = "Strongly Disagree" THEN 1 ELSE 0 END) AS strongly_disagree_count
    ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->where('responses.created_at >=', $oneWeekAgo) // Filter for responses in the last week         
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department')
            ->findAll();
    }

    public function getMonthlyCounted($startDate = null, $endDate = null, $department_id= null)
    {


        $startDate = date('Y-m-d', strtotime($startDate)); // Convert start date to YYYY-MM-DD format
    $endDate = date('Y-m-d', strtotime($endDate)); 

        return $this->select('
            department_tbl.department, 
            COUNT(CASE WHEN responses.question_id = 1 THEN 1 END) AS total_responses,
            SUM(CASE WHEN responses.response_value = "Agree" THEN 1 ELSE 0 END) AS agree_count,
            SUM(CASE WHEN responses.response_value = "Disagree" THEN 1 ELSE 0 END) AS disagree_count,
            SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" THEN 1 ELSE 0 END) AS neither_agree_nor_disagree,
            SUM(CASE WHEN responses.response_value = "Strongly Agree" THEN 1 ELSE 0 END) AS strongly_agree_count,
            SUM(CASE WHEN responses.response_value = "Strongly Disagree" THEN 1 ELSE 0 END) AS strongly_disagree_count
        ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->where('responses.created_at >=', $startDate)
            ->where('responses.created_at <=', $endDate) 
            ->where('responses.department_id', $department_id) 
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department')
            ->findAll();
    }
}
