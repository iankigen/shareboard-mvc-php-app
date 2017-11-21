<?php
class UserModel extends Model{

    public function register(){
        // Sanitize POST array
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']) {
            $name = $post['name'];
            $email = $post['email'];
            $password = md5($post['password']);

            if($name == '' || $email =='' || $password == ''){
                Messages::setMsg('Please fill in all fields', 'warning');
                return;
            }

            $this->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

            // Data binding
            $this->bind(':name', $name);
            $this->bind(':email', $email);
            $this->bind(':password', $password);
            $this->execute();

            // Verify

            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'users/login');
            }
        }
    }

    public function login(){
        // Sanitize POST array
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']) {

            $email = $post['email'];
            $password = md5($post['password']);

            $this->query('SELECT * FROM users WHERE email=:email AND password=:password');

            // Data binding
            $this->bind(':email', $email);
            $this->bind(':password', $password);
            $this->execute();

            // Verify

            $row = $this->single();

            if($row){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email']
                );
                header('Location: '.ROOT_URL.'shares');
            }else{
                Messages::setMsg('Incorrect Login', 'error');
            }
        }
    }
}