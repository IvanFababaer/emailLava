<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class MainController extends Controller {

    public function __construct(){
        parent::__construct();
        // $this->call->library('session');
        $this->getusers = $this->User_model->getusers();
    }
	public function login(){
        return $this->call->view('login');
    }
	public function register(){
        return $this->call->view('register');
    }
	public function upload(){
        return $this->call->view('upload_form');
    }
    
    // public function logout() {
    //     $this->session->unset_userdata('userEmail');

    //     redirect('login');
    // }
    
    public function create() {
        $email = $this->io->post('email');
        $password = $this->io->post('password');
        $data = array(
            "email" => $email,
            "password"=> password_hash($password,PASSWORD_DEFAULT),
            "status" => "unverified",
        );
        $this->User_model->addUser($data);
        redirect('login');
    }
    public function auth() {
        $email = $this->io->post('email');
        $password = $this->io->post('password');
        
        $users = $this->getusers;
        foreach ($users as $user) {
            if ($email == $user['email']) {
                if (password_verify($password, $user['password'])) {
                    if($user['status'] == "unverified")
                    {
                        $recepient_email = $email;
                        $subject = "Email Verification";
                        $content = "click the link to verify <a href='" . site_url("pending") . "/" . $user['id'] . "'>Link</a>";
                        $this->sendVerify($recepient_email,$subject,$content);
                        
                        $this->call->view('unverified');
                        return;
                    } else {
                        $this->session->set_userdata('userEmail', $user['email']);
                        $data['email'] = $this->session->userdata('userEmail');
                        $this->call->view('verified',$data);
                        return;
                    }
                } else {
                    redirect('login');
                    return;
                }
            }
        }
        redirect('login');
    }

    public function pending($id)
    {
        $data = $this->User_model->searchUser($id);
        $data['status'] = "verified";
        if($data['status'] == "verified")
        {
            $this->User_model->updateToken($id,$data);
            $this->session->set_userdata('userEmail', $data['email']);
            $this->call->view('verified',$data);
        } else {
            $this->call->view('unverified');
        }
    }

    public function sendVerify($recepient_email,$subject,$content)
    {
        $this->email->sender('ivanfababaer018@gmail.com', 'Lavalust Activity');
        $this->email->recipient($recepient_email);
        $this->email->subject($subject);
        $this->email->email_content($content,"html");
        $this->email->send();
    }

    public function uploadFile() {
        // Load the upload library and set configuration
        $this->call->library('upload', $_FILES["fileToUpload"]);
        $this->upload
            ->set_dir('public')
            ->allowed_extensions(['jpg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx'])
            ->allowed_mimes([
                'image/jpeg', 'image/png', 'application/pdf', 
                'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ]);
    
        // Check if the upload was successful
        if ($this->upload->do_upload()) {
            $filename = $this->upload->get_filename();
            $path = "public/" . $filename;
            
            // Send the email with the uploaded file
            $this->send(
                $this->io->post('email'),
                $this->io->post('name'),
                $this->io->post('subject'),
                $this->io->post('content'),
                $path
            );
    
            echo 'success';
        } else {
            // Handle errors
            $data['errors'] = $this->upload->get_errors();
            $this->call->view('upload_form', $data);
        }
    }
    
    
    

    Public function send($email,$name,$subject,$content,$path)
    {
        $fullContent = "Hello, <br><br>This is a sample email.<br>These are the email's contents: <br>" . $content;
        $this->email->recipient($email);
        $this->email->sender($this->session->userdata('userEmail'), $name);

        $this->email->subject($subject);
        $this->email->email_content($fullContent,'html');
        $this->email->attachment($path);
        $this->email->send();
    }
}

