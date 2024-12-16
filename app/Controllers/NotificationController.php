<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\RespondentModel;
use app\models\SurveyModel;
use app\Models\QuestionModel;

class NotificationController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
    }

    public function viewRespondentAnsweredSurvey($id)
    {
        $model = new RespondentModel();
        $data['respondentquestions'] = $model

            ->select(

                'responses.response_value,
            responses.question_id,
            responses.respondent_id,
            responses.department_id,
            responses.created_at,           
            questions_tbl.question,
            department_tbl.department,
            respondent_tbl.id'
            )
            ->join('responses', 'respondent_tbl.id = responses.respondent_id')
            ->join('department_tbl', 'responses.department_id = department_tbl.department_id')
            ->join('questions_tbl', 'responses.question_id = questions_tbl.id')
            ->where('respondent_tbl.id', $id)
            ->findAll();


        $model = new RespondentModel();
        $data['respondents'] = $model
            ->select('id,
            respondent_name,
            gender, 
            age,
            region,
            service_feedback,
            client_type, 
            area_went,')
                // ->join('responses', 'respondent_tbl.id = responses.respondent_id')       

            ->where('respondent_tbl.id', $id)->first();
            // ->find($id);
            //  print_r($data);
            // Return the view with the fetched data
        return view('pages/surveyprofile', $data);
    }
}
