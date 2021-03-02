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

    public function feedbacks(Request $request)
    {
        // get feedbacks
        $feedbacks = $this->feedbackModel->getFeedbacks();

        $data = [
            'feedbacks' => $feedbacks,
            
        ];
        return $this->render('feedbacks/feedbacks', $data);
    }


}