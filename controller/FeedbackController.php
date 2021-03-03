<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\model\FeedbackModel;
use app\model\UserModel;

class FeedbackController extends Controller
{
    public FeedbackModel $feedbackModel;
    public UserModel $userModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
        $this->userModel = new UserModel();
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
            
            //validate title
            if (empty($data['title'])) {
                $data['titleErr'] = "Please enter a title";
            }
            // validate body
            if (empty($data['body'])) {
                $data['bodyErr'] = "Please enter a body";
            }
            // if no errrors
            if (empty($data['titleErr']) && empty($data['bodyErr'])) {

                if ($this->feedbackModel->addFeedback($data)){

                    $feedbacks = $this->feedbackModel->getFeedbacks(); 
                        $data = [
                            'feedbacks' => $feedbacks,
            
                        ];
                        // mano uzdeta
                        return $this->render('feedbacks/feedbacks', $data); 
                } else {
                    die('something went wrong');
                }
            } else {
                return $this->render('feedbacks/feedbacks', $data); 
            }

            return $this->render('feedbacks/feedbacks', $data); 
        endif;
    }





}