<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SurveyModel;
use App\Models\DepartmentModel;

class TestController extends BaseController
{
    public function index()
    {
        return view('/test');
    }

    public function Response()
    {
        $model = new SurveyModel();
        $data['countresponse'] = $model->getCounts();
        return view('/SurveyPage/surveyresponse', $data);
    }

    public function getalltable()
    {
        $model = new SurveyModel();
        $deptmodel = new DepartmentModel();

        $data['responses'] = $model

            ->select('survey_responses.id,
            survey_responses.satisfaction, 
            survey_responses.time_spent,
            process_followed,
            steps_ease, info_access,
            payment_value, no_favoritism, 
            staff_helpfulness, needed_info, 
            survey_responses.steps_ease,
            survey_responses.info_access,
            survey_responses.payment_value, 
            survey_responses.no_favoritism, 
            survey_responses.staff_helpfulness, 
            survey_responses.needed_info, 
            survey_responses.needed_info, 
            survey_responses.FullnameofRespondent, 
            survey_responses.created_at, 
            department_tbl.department')
            ->join('department_tbl', 'survey_responses.department_id = department_tbl.department_id')
            ->findAll();
        return view('/test', $data);
    }
}
