<?php

namespace App\Models;

use CodeIgniter\Model;




class SurveyModel extends Model
{
    
    protected $table1 = 'responses';  // Replace with your first table name
    protected $table2 = 'department_tbl';  // Replace with your second table name

    protected $table = 'survey_responses';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'satisfaction',
        'time_spent',
        'process_followed',
        'steps_ease',
        'info_access',
        'payment_value',
        'no_favoritism',
        'staff_helpfulness',
        'needed_info', 
        'FullnameofRespondent',
        'department_id',
        'created_at'
    ];

    public function getSurveyResponses()
    {
        return $this->select('sr.id, sr.satisfaction, sr.time_spent, sr.process_followed, 
        sr.steps_ease, sr.info_access, sr.payment_value, 
        sr.no_favoritism, sr.staff_helpfulness, sr.needed_info, 
        sr.department_id, sr.FullnameofRespondent, sr.created_at, 
        dt.department')
->from('survey_responses AS sr')
->join('department_tbl AS dt', 'sr.department_id = dt.department_id')
->groupBy('survey_responses.department')
->findAll();
    }

    public function getSurveyData()
    {
        return $this->findAll();
    }
    public function countSurveyThisMonth()
    {

        $builder = $this->db->table($this->table);
        $builder->where('MONTH(created_at)', date('m'));
        $builder->where('YEAR(created_at)', date('Y'));
        return $builder->countAllResults();
    }

    public function countSurveyThisWeek()
    {
        $builder = $this->db->table($this->table);
        $builder->where('created_at >=', date('Y-m-d H:i:s', strtotime('monday this week')));
        $builder->where('created_at <=', date('Y-m-d H:i:s', strtotime('sunday this week')));
        return $builder->countAllResults();
    }

    public function getSurveys($limit, $searchInput)
    {
        $builder = $this->builder();

        if ($searchInput) {
            $builder->like('satisfaction', $searchInput)
                ->orLike('time_spent', $searchInput)
                ->orLike('process_followed', $searchInput);
        }

        return $builder->limit($limit)->get()->getResultArray();
    }

    public function getCounts()
    {
        return $this->select('
                department_tbl.department AS department,
                COUNT(*) AS total_responses,

                SUM(CASE WHEN satisfaction = "Strongly_Agree" THEN 1 ELSE 0 END) AS satisfaction_strongly_agree_count,
                SUM(CASE WHEN satisfaction = "Agree" THEN 1 ELSE 0 END) AS satisfaction_agree_count,
                SUM(CASE WHEN satisfaction = "Neither_agree_nor_dissatisfied" THEN 1 ELSE 0 END) AS satisfaction_neither_count,
                SUM(CASE WHEN satisfaction = "Disagree" THEN 1 ELSE 0 END) AS satisfaction_disagree_count,
                SUM(CASE WHEN satisfaction = "Strongly_Disagree" THEN 1 ELSE 0 END) AS satisfaction_strongly_disagree_count
            ')
            ->join('department_tbl', 'survey_responses.department_id = department_tbl.department_id')
            ->groupBy('survey_responses.department_id')
            ->findAll();
    }

    public function getTodayCounts()
{
    $todayStart = date('Y-m-d 00:00:00'); // Start of today
    $todayEnd = date('Y-m-d 23:59:59');   // End of today

    return $this->select('
            department_tbl.department AS department,
            COUNT(*) AS total_responses,
            SUM(CASE WHEN satisfaction = "Strongly_Agree" THEN 1 ELSE 0 END) AS satisfaction_strongly_agree_count,
            SUM(CASE WHEN satisfaction = "Agree" THEN 1 ELSE 0 END) AS satisfaction_agree_count,
            SUM(CASE WHEN satisfaction = "Neither_agree_nor_dissatisfied" THEN 1 ELSE 0 END) AS satisfaction_neither_count,
            SUM(CASE WHEN satisfaction = "Disagree" THEN 1 ELSE 0 END) AS satisfaction_disagree_count,
            SUM(CASE WHEN satisfaction = "Strongly_Disagree" THEN 1 ELSE 0 END) AS satisfaction_strongly_disagree_count
        ')
        ->join('department_tbl', 'survey_responses.department_id = department_tbl.department_id')
        ->where('survey_responses.created_at >=', $todayStart)
        ->where('survey_responses.created_at <=', $todayEnd)
        ->groupBy('survey_responses.department_id')
        ->findAll();
}


    public function getWeeklyCounts()
    {
        $oneWeekAgo = date('Y-m-d H:i:s', strtotime('-7 days')); // Calculate the date one week ago

        return $this->select('
                department_tbl.department AS department,
                COUNT(*) AS total_responses,
                SUM(CASE WHEN satisfaction = "Strongly_Agree" THEN 1 ELSE 0 END) AS satisfaction_strongly_agree_count,
                SUM(CASE WHEN satisfaction = "Agree" THEN 1 ELSE 0 END) AS satisfaction_agree_count,
                SUM(CASE WHEN satisfaction = "Neither_agree_nor_dissatisfied" THEN 1 ELSE 0 END) AS satisfaction_neither_count,
                SUM(CASE WHEN satisfaction = "Disagree" THEN 1 ELSE 0 END) AS satisfaction_disagree_count,
                SUM(CASE WHEN satisfaction = "Strongly_Disagree" THEN 1 ELSE 0 END) AS satisfaction_strongly_disagree_count
            ')
            ->join('department_tbl', 'survey_responses.department_id = department_tbl.department_id')
            ->where('survey_responses.created_at >=', $oneWeekAgo) // Filter for responses in the last week
            ->groupBy('survey_responses.department_id')
            ->findAll();
    }
    
    public function getMonthlyCounts()
{
    $oneMonthAgo = date('Y-m-d H:i:s', strtotime('-30 days')); // Calculate the date one month ago

    return $this->select('
            department_tbl.department AS department,
            COUNT(*) AS total_responses,
            SUM(CASE WHEN satisfaction = "Strongly_Agree" THEN 1 ELSE 0 END) AS satisfaction_strongly_agree_count,
            SUM(CASE WHEN satisfaction = "Agree" THEN 1 ELSE 0 END) AS satisfaction_agree_count,
            SUM(CASE WHEN satisfaction = "Neither_agree_nor_dissatisfied" THEN 1 ELSE 0 END) AS satisfaction_neither_count,
            SUM(CASE WHEN satisfaction = "Disagree" THEN 1 ELSE 0 END) AS satisfaction_disagree_count,
            SUM(CASE WHEN satisfaction = "Strongly_Disagree" THEN 1 ELSE 0 END) AS satisfaction_strongly_disagree_count
           
        ')
        ->join('department_tbl', 'survey_responses.department_id = department_tbl.department_id')
        ->where('survey_responses.created_at >=', $oneMonthAgo) // Filter for responses in the last month
        ->groupBy('survey_responses.department_id')
        ->findAll();
}


public function countperQuestion()
    {
        return $this->select('
                department_tbl.department AS department,
                COUNT(*) AS total_responses,

                SUM(CASE WHEN satisfaction = "Strongly_Agree" THEN 1 ELSE 0 END) AS satisfaction_strongly_agree_count,
                
            ')
            ->join('department_tbl', 'survey_responses.department_id = department_tbl.department_id')
            ->groupBy('survey_responses.department_id')
            ->findAll();
    }

    public function counttable1()
    {
        // Count rows from the first table
        $count1 = $this->db->table($this->table1)->countAllResults();

    }
    public function counttable2()
    {
        // Count rows from the second table
        $count2 = $this->db->table($this->table2)->countAllResults();

        return [
            'table2_count' => $count2,
        ];
    }
  
  
}
