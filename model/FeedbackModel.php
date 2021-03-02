<?php


namespace app\model;


use app\core\Application;
use app\core\Database;

class FeedbackModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = Application::$app->db;
    }
    
    public function getFeedbacks()
    {
        $sql = "SELECT * FROM `feedbacks`";

        $this->db->query($sql);

        $result = $this->db->resultSet();

        return $result;
    }

}