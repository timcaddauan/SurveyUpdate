<?php

namespace App\Controllers;

use App\Models\SurveyModel;
use App\Models\DepartmentModel;
use App\Models\QuestionModel;
use App\Models\RespondentModel;
use App\Models\UserModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Survey extends BaseController
{
    protected $db;

    public function index()
    {
        

    }

    public function __construct()
    {

        $this->db = \Config\Database::connect();
    }

    public function submit()
    {
        $model = new SurveyModel();

        $data = [
            'satisfaction' => $this->request->getPost('satisfaction'),
            'time_spent' => $this->request->getPost('time_spent'),
            'process_followed' => $this->request->getPost('process_followed'),
            'steps_ease' => $this->request->getPost('steps_ease'),
            'info_access' => $this->request->getPost('info_access'),
            'payment_value' => $this->request->getPost('payment_value'),
            'no_favoritism' => $this->request->getPost('no_favoritism'),
            'staff_helpfulness' => $this->request->getPost('staff_helpfulness'),
            'needed_info' => $this->request->getPost('needed_info'),
            'FullnameofRespondent' => $this->request->getPost('FullnameofRespondent'),
            'department_id' => $this->request->getPost('department_id'),
        ];

        // Save to database
        if ($model->save($data)) {
            return redirect()->to('/Thankyou');
        } else {
            // Handle errors if needed
            return redirect()->back()->with('errors', $model->errors());
        }
    }

    public function thank_you()
    {
        return view('SurveyPage/thank_you');
    }



    public function results()
    {
        $model = new SurveyModel();
        // Get the limit and search query from the request
        $limit = $this->request->getVar('limit') ?? 10;
        $searchInput = $this->request->getVar('searchInput');

        // Fetch the survey results based on the limit and search
        if ($searchInput) {
            // Modify the query to filter by search input
            $data['results'] = $model->like('satisfaction', $searchInput)
                ->orLike('time_spent', $searchInput)
                ->orLike('process_followed', $searchInput)
                ->orLike('steps_ease', $searchInput)
                ->orLike('info_access', $searchInput)
                ->orLike('payment_value', $searchInput)
                ->orLike('no_favoritism', $searchInput)
                ->orLike('staff_helpfulness', $searchInput)
                ->orLike('needed_info', $searchInput)
                ->orLike('FullnameofRespondent', $searchInput)

                ->findAll($limit);
        } else {
            $data['results'] = $model
                ->select('survey_responses.id, survey_responses.satisfaction, survey_responses.time_spent, process_followed, steps_ease, info_access, payment_value, no_favoritism, staff_helpfulness, needed_info, survey_responses.FullnameofRespondent, survey_responses.created_at, department_tbl.department')
                ->join('department_tbl', 'survey_responses.department_id = department_tbl.department_id')
                ->findAll();
        }

        // Count occurrences of each satisfaction rating (1-6)
        $data['counts'] = array_count_values(array_column($data['results'], 'satisfaction'));

        // Pass the search input to the view
        $data['searchInput'] = $searchInput;

        return view('/SurveyPage/survey_results', $data);
    }


    public function loadQuestions()
    {
        if (session()->get('isLoggedIn')) 
    {
            
        $queryQuestion = $this->db->table('questions_tbl')->get();
        $queryDepartment = $this->db->table('department_tbl')->get();
        if ($queryQuestion->getNumRows() > 0 && $queryDepartment->getNumRows() > 0) {
            $dataQuestion = $queryQuestion->getResultArray();
            $dataDepartment = $queryDepartment->getResultArray();
            return view('SurveyPage/Question', ['questions' => $dataQuestion, 'depts' => $dataDepartment]);
        } else {
            $dataQuestion['quest'] = null;
            return view('SurveyPage/Question', $dataQuestion);
        }
    }
    else
    {
        return redirect()->to(base_url('/login'));
    }

    }
    
    public function  submitResponse()
    {
        $qs = $this->request->getPost('qs');
        // print_r ($qs);
        foreach ($qs as $q) {
            if (isset($q['response'])) {
                // print_r ($q);
                $data = [
                    'question_id' => $q['id'],
                    'response_value' => $q['response'],
                ];
                $this->db->table('responses')->insert($data);
            }
        }
    }

    public function SurveyDept()
    {
        $model = new DepartmentModel();
        $data['depts'] = $model->getAllDepartments();
        return view('SurveyPage/Question', $data);
    }


    public function submitResponseDept()
    {
        // Capture the form data
     
        $fullName = $this->request->getPost('respondent_name');
        $gend = $this->request->getPost('gender');
        $agee = $this->request->getPost('age');
        $reg = $this->request->getPost('region');
        $service = $this->request->getPost('service_feedback');
        $departmentId = $this->request->getPost('department_id');
        $clienttype = $this->request->getPost('client_type');
        
        // Insert into 'respondent_tbl'
        $respondentData = [            
            'respondent_name' => $fullName,
            'area_went' => $departmentId,
            'gender' => $gend,
            'age' => $agee,
            'region' => $reg,
            'service_feedback' => $service,
            'client_type' => $clienttype,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->db->table('respondent_tbl')->insert($respondentData);
        $respondentId = $this->db->insertID();
        
        // Create a notification for the department
        $notificationData = [  
            'respondent_id' => $respondentId,
            'user_id' => $departmentId,  // use $departmentId if you want it based on department_id        
            'message' => "New response by {$fullName}",
            'is_read' => false,
            'created_at' => (new \CodeIgniter\I18n\Time())->addHours(8)->toDateTimeString()
        ];

        $this->db->table('notifications')->insert($notificationData);
        
        // Process question responses
        $qs = $this->request->getPost('qs');
        foreach ($qs as $q) {
            if (isset($q['response'])) {
                $data = [
                    'question_id' => $q['id'],
                    'response_value' => $q['response'],
                    'respondent_id' => $respondentId,
                    'department_id' => $departmentId,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->db->table('responses')->insert($data);
            }
        }

        // Redirect after submission
        return redirect()->to('/Thankyou');
    }

    
    public function getNotifications()
    {
        $userId = session()->get('id'); // Assuming user is logged in and user_id is stored in the session
    
        if (!$userId) {
            return $this->response->setStatusCode(400, 'User not logged in');
        }
    
        // Query to fetch unread notifications for the logged-in user
        $notifications = $this->db->table('notifications')
            ->where('user_id', $userId)
            ->where('is_read', false) // Assuming 'is_read' column for unread notifications
            ->orderBy('created_at', 'desc') // Order notifications by creation date
            ->get()
            ->getResultArray();
            
            // Ensure you return the data in the correct format (e.g., message, notification ID, etc.)
        $formattedNotifications = array_map(function ($notification) {
            return [
                'respondent_id' => $notification['respondent_id'],
                'id' => $notification['id'], // Assuming 'id' is the notification ID
                'message' => $notification['message'], // Assuming 'message' is the notification content
                'created_at' => $notification['created_at'] // Include created_at timestamp
            ];
        }, $notifications);
    
        return $this->response->setJSON($formattedNotifications);
    }
        
    

    public function markAsRead($notificationId)
    {
        // Update the notification to mark it as read
        $this->db->table('notifications')
        ->where('id', $notificationId)
        ->update(['is_read' => true]);
        
        return $this->response->setStatusCode(200); // Success response
    }

    public function getAllNotifications()
    {
        $userId = session()->get('id'); // Assuming user is logged in and user_id is stored in the session
        
        if (!$userId) {
            return $this->response->setStatusCode(400, 'User not logged in');
        }
    
        // Query to fetch all notifications (both read and unread) for the logged-in user
        $notifications = $this->db->table('notifications')
        ->where('user_id', $userId) // Get notifications for the specific user
        ->orderBy('created_at', 'desc') // Order notifications by creation date (newest first)
        ->get()
        ->getResultArray();
        
        // Format the notifications into a structure that includes the notification ID, message, timestamp, and read status
        $formattedNotifications = array_map(function ($notification) {
            return [
                'respondent_id' => $notification['respondent_id'],
                'id' => $notification['id'], // Notification ID
                'message' => $notification['message'], // Notification content
                'created_at' => $notification['created_at'], // Timestamp when the notification was created
                'is_read' => $notification['is_read'] // Include read status
            ];
        }, $notifications);
    
        return $this->response->setJSON($formattedNotifications); // Return the notifications as JSON
    }
    
    public function ViewNotificationsbyID($ResponseId)
    {
        // Fetch notifications for the specific user (based on $ResponseId)
        $notifications = $this->db->table('respondent_tbl')
            ->where('id', $ResponseId) // Get notifications for the specific user by ID
            ->orderBy('respondent_name', 'asc')
            ->orderBy('age', 'asc')
            ->orderBy('region', 'asc')
            ->get()
            ->getResultArray();
            
    
        // Format the notifications
        $formattedNotifications = array_map(function ($notification) {
            return [
                'respondent_name' => $notification['respondent_name'], 
                'age' => $notification['age'], 
                'region' => $notification['region'],          
            ];
        }, $notifications);
        
    
        // Return the formatted notifications to the view
        return view('pages/ViewNotificationsbyID', ['notifications' => $formattedNotifications]);
    }
    
        


    private function setRespondentSession($respondent)
    {
        $data = [
            'id' => $respondent['id'],
            'respondent_name' => $respondent['respondent_name'],
            'gender' => $respondent['gender'],
            'age' => $respondent['age'],
            'region' => $respondent['region'],
            'service_feedback' => $respondent['service_feedback'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function AllNotification()
{
    $userId = session()->get('id'); // Assuming user is logged in and user_id is stored in the session

    if (!$userId) {
        return $this->response->setStatusCode(400, 'User not logged in');
    }

    // Query to fetch all notifications (both read and unread) for the logged-in user
    $notifications = $this->db->table('notifications')
        ->where('user_id', $userId) // Get notifications for the specific user
        ->orderBy('created_at', 'desc') // Order notifications by creation date (newest first)
        ->get()
        ->getResultArray();

    // Pass the notifications to the view
    return view('/pages/AllNotifications', ['notifications' => $notifications]);
}

public function GeneratePDF($department_id)
    {
        $model = new RespondentModel();
        $data['respondents'] = $model

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
            ->where('respondent_tbl.id', $department_id)
            ->findAll();

        $model = new RespondentModel();
        $data['respondents2'] = $model
            ->select('id,
            respondent_name as name,
            gender, 
            age,
            region,
            service_feedback,
            client_type, 
            area_went,')
            // ->join('responses', 'respondent_tbl.id = responses.respondent_id')       
            ->where('respondent_tbl.id', $department_id)->first();
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $html = view('SurveyPage/loadpdf', $data);

        $dompdf->loadHtml($html);

        $dompdf->render();

        $filename = 'department'.date('Y-m-d') . '.pdf';

        $dompdf->stream($filename, array("Attachment" => false));

        return view('SurveyPage/loadpdf', $data);
    }

}
