<?php

class ShareModel extends Model
{
    public function index()
    {
        $this->query('SELECT * FROM shares ORDER BY create_date DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function add(){
        // Sanitize POST array
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
            $title = $post['title'];
            $body = $post['body'];
            $link = $post['link'];
            $this->query('INSERT INTO shares (title, body, link, user_id) VALUES (:title, :body, :link, :user_id)');

            // Data binding
            $this->bind(':title', $title);
            $this->bind(':body', $body);
            $this->bind(':link', $link);
            $this->bind(':user_id', $_SESSION['user_data']['id']);
            $this->execute();

            // Verify

            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'shares');
            }
        }
        return;
    }
}