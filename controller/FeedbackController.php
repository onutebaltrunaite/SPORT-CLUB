<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\core\Validation;
use app\model\FeedbackModel;
use app\model\UserModel;

class FeedbackController extends Controller
{
    public FeedbackModel $feedbackModel;
    public UserModel $userModel;
    public Validation $vld;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
        $this->userModel = new UserModel();
        $this->vld = new Validation();
    }


    public function addFeedbacks(Request $request)
    {

        if ($request->isGet()) :

            $feedbacks = $this->feedbackModel->getFeedbacks();
            
            $data = [
                'feedbacks' => $feedbacks,
                'title' => '',
                'body' => '',
                'errors' => [
                    'titleErr' => '',
                    'bodyErr' => '',
                ]
            ];
            
                return $this->render('feedbacks/feedbacks', $data);  
        endif;

        if ($request->isPost()) :

            $data = $request->getBody();
            $data['errors']['titleErr'] = $this->vld->validateFeedback($data['title'], 50);
            $data['errors']['bodyErr'] = $this->vld->validateFeedback($data['body'], 500);

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            // if no errrors
            if (empty($data['errors']['titleErr']) && empty($data['errors']['bodyErr'])) {

                if ($this->feedbackModel->addFeedback($data)){
                    $feedbacks = $this->feedbackModel->getFeedbacks();
                    $data['feedbacks'] = $feedbacks;
                        
                    return $this->render('feedbacks/feedbacks', $data);
                } else {
                    die('something went wrong with adding feedback');
                }
            } else {
                $feedbacks = $this->feedbackModel->getFeedbacks();
                $data['feedbacks'] = $feedbacks;
                return $this->render('feedbacks/feedbacks', $data); 
            }

        endif;


    }





}