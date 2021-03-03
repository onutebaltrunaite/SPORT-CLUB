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
        $sql = "SELECT feedbacks.title, feedbacks.body, users.name, users.email,
        feedbacks.feedback_id as feedback_id,
        users.id as user_id,
        feedbacks.created_at as feedbackCreated,
        users.created_at as userCreated
        FROM feedbacks
        INNER JOIN users
        ON feedbacks.user_id = users.id
        ORDER BY feedbacks.created_at DESC";

        $this->db->query($sql);

        $result = $this->db->resultSet();

        return $result;
    }

    public function addFeedback($data)
    {
        // prepare statement
        $this->db->query("INSERT INTO posts (`title`, `body`, `user_id`) VALUES (:title, :body, :user_id)");

        $this->db->query("INSERT INTO `feedbacks`(`user_id`, `title`, `body`) VALUES (:user_id, :title, :body)");

        // add values
        $this->db->bind(':user_id', $_SESSION['user_id']);        
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        // make query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}