<?php

namespace App\Controllers;

use App\Models\SurveyModel;
use App\Models\DepartmentModel;
use App\Models\QuestionModel;
use App\Models\RespondentModel;
use App\Models\UserModel;
use \DateTime;
use Dompdf\Dompdf;
use Dompdf\Options;

class Home extends BaseController
{
    protected $db;
    public function __construct()
    {

        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        // SESSION
        $department_id = session()->get('id');

        $model = new SurveyModel();
        $data['surveyCountThisMonth'] = $model->countSurveyThisMonth();

        $model = new SurveyModel();
        $data['surveyCountThisWeek'] = $model->countSurveyThisWeek();

        $model = new SurveyModel();
        $data['counter'] = $model->getCounts();

        $model = new SurveyModel();
        $data['MonthlyCount'] = $model->getMonthlyCounts();

        $model = new SurveyModel();
        $data['WeeklyCount'] = $model->getWeeklyCounts();

        $model = new SurveyModel();
        $data['todayCounts'] = $model->getTodayCounts();

        $model = new SurveyModel();
        $data['countperQuestionnum'] = $model->countperQuestion();

        $model = new QuestionModel();
        $data['todayCounted'] = $model->getTodayCounted();

        $model = new QuestionModel();
        $data['WeeklyCounted'] = $model->getWeeklyCounted();

        $model = new QuestionModel();
        $data['MonthlyCounted'] = $model->getMonthlyCounted();

        $model = new QuestionModel();
        $data['respondent'] = $model
            ->select('question_id, response_value, COUNT(*) AS response_count')
            ->where('department_id', $department_id)
            ->groupBy('question_id, response_value')
            ->orderBy('question_id, response_value')
            ->findAll();

        $model = new QuestionModel();
        $data['perQuestion1'] = $model
            ->select('
        department_tbl.department, 
        COUNT(CASE WHEN responses.question_id = 1 THEN 1 END) AS total_responses,
        SUM(CASE WHEN responses.response_value = "Agree" AND responses.question_id = 1 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 1 THEN 1 END), 0) AS agree_count,
        SUM(CASE WHEN responses.response_value = "Disagree" AND responses.question_id = 1 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 1 THEN 1 END), 0) AS disagree_count,
        SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" AND responses.question_id = 1 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 1 THEN 1 END), 0) AS neither_agree_nor_disagree,
        SUM(CASE WHEN responses.response_value = "Strongly Agree" AND responses.question_id = 1 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 1 THEN 1 END), 0) AS strongly_agree_count,
        SUM(CASE WHEN responses.response_value = "Strongly Disagree" AND responses.question_id = 1 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 1 THEN 1 END), 0) AS strongly_disagree_count
    ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->where('responses.department_id', $department_id)
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department')
            ->findAll();




        $model = new QuestionModel();
        $data['perQuestion2'] = $model
            ->select('
            department_tbl.department, 
            COUNT(CASE WHEN responses.question_id = 2 THEN 1 END) AS total_responses,
            SUM(CASE WHEN responses.response_value = "Agree" AND responses.question_id = 2 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 2 THEN 1 END), 0) AS agree_count,
            SUM(CASE WHEN responses.response_value = "Disagree" AND responses.question_id = 2 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 2 THEN 1 END), 0) AS disagree_count,
            SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" AND responses.question_id = 2 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 2 THEN 1 END), 0) AS neither_agree_nor_disagree,
            SUM(CASE WHEN responses.response_value = "Strongly Agree" AND responses.question_id = 2 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 2 THEN 1 END), 0) AS strongly_agree_count,
            SUM(CASE WHEN responses.response_value = "Strongly Disagree" AND responses.question_id = 2 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 2 THEN 1 END), 0) AS strongly_disagree_count
        ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->where('responses.department_id', $department_id)
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department')
            ->findAll();

        $model = new QuestionModel();
        $data['perQuestion3'] = $model
            ->select('
                department_tbl.department, 
                COUNT(CASE WHEN responses.question_id = 3 THEN 1 END) AS total_responses,
                SUM(CASE WHEN responses.response_value = "Agree" AND responses.question_id = 3 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 3 THEN 1 END), 0) AS agree_count,
                SUM(CASE WHEN responses.response_value = "Disagree" AND responses.question_id = 3 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 3 THEN 1 END), 0) AS disagree_count,
                SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" AND responses.question_id = 3 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 3 THEN 1 END), 0) AS neither_agree_nor_disagree,
                SUM(CASE WHEN responses.response_value = "Strongly Agree" AND responses.question_id = 3 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 3 THEN 1 END), 0) AS strongly_agree_count,
                SUM(CASE WHEN responses.response_value = "Strongly Disagree" AND responses.question_id = 3 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 3 THEN 1 END), 0) AS strongly_disagree_count
            ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->where('responses.department_id', $department_id)
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department')
            ->findAll();

        $model = new QuestionModel();
        $data['perQuestion4'] = $model
            ->select('
                    department_tbl.department, 
                    COUNT(CASE WHEN responses.question_id = 4 THEN 1 END) AS total_responses,
                    SUM(CASE WHEN responses.response_value = "Agree" AND responses.question_id = 4 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 4 THEN 1 END), 0) AS agree_count,
                    SUM(CASE WHEN responses.response_value = "Disagree" AND responses.question_id = 4 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 4 THEN 1 END), 0) AS disagree_count,
                    SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" AND responses.question_id = 4 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 4 THEN 1 END), 0) AS neither_agree_nor_disagree,
                    SUM(CASE WHEN responses.response_value = "Strongly Agree" AND responses.question_id = 4 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 4 THEN 1 END), 0) AS strongly_agree_count,
                    SUM(CASE WHEN responses.response_value = "Strongly Disagree" AND responses.question_id = 4 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 4 THEN 1 END), 0) AS strongly_disagree_count
                ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->where('responses.department_id', $department_id)
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department')
            ->findAll();

        $model = new QuestionModel();
        $data['perQuestion5'] = $model
            ->select('
                        department_tbl.department, 
                        COUNT(CASE WHEN responses.question_id = 5 THEN 1 END) AS total_responses,
                        SUM(CASE WHEN responses.response_value = "Agree" AND responses.question_id = 5 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 5 THEN 1 END), 0) AS agree_count,
                        SUM(CASE WHEN responses.response_value = "Disagree" AND responses.question_id = 5 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 5 THEN 1 END), 0) AS disagree_count,
                        SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" AND responses.question_id = 5 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 5 THEN 1 END), 0) AS neither_agree_nor_disagree,
                        SUM(CASE WHEN responses.response_value = "Strongly Agree" AND responses.question_id = 5 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 5 THEN 1 END), 0) AS strongly_agree_count,
                        SUM(CASE WHEN responses.response_value = "Strongly Disagree" AND responses.question_id = 5 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 5 THEN 1 END), 0) AS strongly_disagree_count
                    ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->where('responses.department_id', $department_id)
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department')
            ->findAll();

        // Query for Question 6
        $model = new QuestionModel();
        $data['perQuestion6'] = $model
            ->select('
           department_tbl.department, 
           COUNT(CASE WHEN responses.question_id = 6 THEN 1 END) AS total_responses,
           SUM(CASE WHEN responses.response_value = "Agree" AND responses.question_id = 6 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 6 THEN 1 END), 0) AS agree_count,
           SUM(CASE WHEN responses.response_value = "Disagree" AND responses.question_id = 6 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 6 THEN 1 END), 0) AS disagree_count,
           SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" AND responses.question_id = 6 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 6 THEN 1 END), 0) AS neither_agree_nor_disagree,
           SUM(CASE WHEN responses.response_value = "Strongly Agree" AND responses.question_id = 6 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 6 THEN 1 END), 0) AS strongly_agree_count,
           SUM(CASE WHEN responses.response_value = "Strongly Disagree" AND responses.question_id = 6 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 6 THEN 1 END), 0) AS strongly_disagree_count
       ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->where('responses.department_id', $department_id)
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department')
            ->findAll();

        // Query for Question 7
        $model = new QuestionModel();
        $data['perQuestion7'] = $model
            ->select('
                department_tbl.department, 
                COUNT(CASE WHEN responses.question_id = 7 THEN 1 END) AS total_responses,
                SUM(CASE WHEN responses.response_value = "Agree" AND responses.question_id = 7 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 7 THEN 1 END), 0) AS agree_count,
                SUM(CASE WHEN responses.response_value = "Disagree" AND responses.question_id = 7 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 7 THEN 1 END), 0) AS disagree_count,
                SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" AND responses.question_id = 7 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 7 THEN 1 END), 0) AS neither_agree_nor_disagree,
                SUM(CASE WHEN responses.response_value = "Strongly Agree" AND responses.question_id = 7 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 7 THEN 1 END), 0) AS strongly_agree_count,
                SUM(CASE WHEN responses.response_value = "Strongly Disagree" AND responses.question_id = 7 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 7 THEN 1 END), 0) AS strongly_disagree_count
            ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->where('responses.department_id', $department_id)
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department')
            ->findAll();

        // Query for Question 8
        $model = new QuestionModel();
        $data['perQuestion8'] = $model
            ->select('
                department_tbl.department, 
                COUNT(CASE WHEN responses.question_id = 8 THEN 1 END) AS total_responses,
                SUM(CASE WHEN responses.response_value = "Agree" AND responses.question_id = 8 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 8 THEN 1 END), 0) AS agree_count,
                SUM(CASE WHEN responses.response_value = "Disagree" AND responses.question_id = 8 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 8 THEN 1 END), 0) AS disagree_count,
                SUM(CASE WHEN responses.response_value = "Neither Agree nor Disagree" AND responses.question_id = 8 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 8 THEN 1 END), 0) AS neither_agree_nor_disagree,
                SUM(CASE WHEN responses.response_value = "Strongly Agree" AND responses.question_id = 8 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 8 THEN 1 END), 0) AS strongly_agree_count,
                SUM(CASE WHEN responses.response_value = "Strongly Disagree" AND responses.question_id = 8 THEN 1 ELSE 0 END) * 100.0 / NULLIF(COUNT(CASE WHEN responses.question_id = 8 THEN 1 END), 0) AS strongly_disagree_count
            ')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('respondent_tbl', 'responses.respondent_id = respondent_tbl.id')
            ->where('responses.department_id', $department_id)
            ->groupBy('department_tbl.department')
            ->orderBy('department_tbl.department')
            ->findAll();



        $model = new SurveyModel();
        $deptmodel = new DepartmentModel();


        $model = new RespondentModel();
        $data['RecentRespondent'] = $model
            ->select('r.id, 
              r.respondent_name, 
              r.area_went, 
              r.created_at, 
              d.department')
            ->from('respondent_tbl r')
            ->join('responses res', 'r.id = res.respondent_id')
            ->join('department_tbl d', 'res.department_id = d.department_id')
            ->where('res.department_id', $department_id)
            ->groupBy('r.id, r.respondent_name, r.area_went, r.created_at, d.department') // grouping by the selected fields
            ->orderBy('r.id', 'DESC')
            ->limit(5) // Limit the results to 5 recent respondents
            ->findAll();



        // Retrieve start and end dates from the request, fallback to defaults if not provided
        $startDate = $this->request->getVar('start') ?? date('Y-m-d', strtotime('-30 days'));  // Default to 30 days ago
        $endDate = $this->request->getVar('end') ?? date('Y-m-d'); // Default to today


        // Initialize the model
        $model = new QuestionModel();

        // Fetch the filtered data based on the date range
        $data['department'] = $model->getMonthlyCounted($startDate, $endDate, $department_id);


        // Pass the startDate and endDate to the view
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['department_id'] = $department_id;


        // Return the view with the filtered data
        return view('/pages/blog', $data);
    }

    
    public function root($path = '')
    {
        if ($path !== '') {
            if (@file_exists(APPPATH . 'Views/' . $path . '.php')) {
                return view($path);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            echo 'Page Not Found.';
        }
    }
}
