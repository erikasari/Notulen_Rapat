  <?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Peserta extends CI_Controller
    {
        function __Construct()
        {
            parent::__Construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library(array('session', 'form_validation', 'email'));
            $this->load->database();
            $this->load->model('Peserta_model');
        }
        public function index()
        {
            $this->load->view('auth/register');
        }
        public function registration()
        {
            //validate input value with form validation class of codeigniter  
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[mst_peserta.email]');
            $this->form_validation->set_rules('telepon', 'telepon', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
            $this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'required|matches[password]');
            //$this->form_validation->set_message('is_unique', 'This %s is already exits');  
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('auth/register');
            } else {
                $username = $_POST['username'];
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $telepon = $_POST['telepon'];
                $password = $_POST['password'];
                $passhash = hash('md5', $password);
                //md5 hashing algorithm to decode and encode input password  
                //$salt    = uniqid(rand(10,10000000),true);  
                $saltid   = md5($email);
                $is_active   = 0;
                $data = array(
                    'username' => $username,
                    'nama' => $nama,
                    'email' => $email,
                    'telepon' => $telepon,
                    'password' => $passhash,
                    'is_active' => $is_active,
                );
                if ($this->Peserta_model->insertpeserta($data)) {
                    if ($this->sendemail($email, $saltid)) {
                        // successfully sent mail to peserta email  
                        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Please confirm the mail sent to your email id to complete the registration.</div>');
                        redirect(base_url());
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please try again ...</div>');
                        redirect(base_url());
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');
                    redirect(base_url());
                }
            }
        }
        function sendemail($email, $saltid)
        {
            // configure the email setting  
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name  
            $config['smtp_port'] = '465'; //smtp port number  
            $config['smtp_user'] = 'haloakun205@gmail.com';
            $config['smtp_pass'] = 'katasandihaloakun'; //$from_email password  
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes  
            $this->email->initialize($config);
            $url = base_url() . "peserta/confirmation/" . $saltid;
            $this->email->from('haloakun205@gmail.com', 'Verification Email');
            $this->email->to($email);
            $this->email->subject('Please Verify Your Email Address');
            $message = "<html><head><head></head><body><p>Hi,</p><p>Thanks for registration with CodesQuery.</p><p>Please click below link to verify your email.</p>" . $url . "<br/><p>Sincerely,</p><p>CodesQuery Team</p></body></html>";
            $this->email->message($message);
            return $this->email->send();
        }
        public function confirmation($key)
        {
            if ($this->Peserta_model->verifyemail($key)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Email Address is successfully verified!</div>');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Your Email Address Verification Failed. Please try again later...</div>');
                redirect(base_url());
            }
        }
    }
