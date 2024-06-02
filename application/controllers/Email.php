

<?php
class Email extends CI_Controller
{

   function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->helper('form');
      $this->load->model('Pemasaran', 'pemasaran');
   }

   public function index()
   {

      $this->load->helper('form');
      $this->load->view('template/sidebar');
      $this->load->view('template/header');
      $this->load->view('email/contact');
   }

   public function send_mail()
   {
      $from_email = "ciptainterior@kkpubl.my.id";
      $email = $this->input->post('email');
      $subject = $this->input->post('subject');
      $message = $this->input->post('message');

      $this->load->library('email');

      $data = array(
         'email' => $email,
         'subject' => $subject,
         'message' => $message

      );

      $this->pemasaran->input_data($data, 'pemasaran');

      $this->email->from($from_email, 'CiptaInterior');
      $this->email->to($email);
      $this->email->subject($subject);

      $body = $this->load->view('email/template_email.php', $data, TRUE);
      $this->email->message($body);

      $this->email->set_newline("\r\n");
      $this->email->set_mailtype("html");

      //Send mail 
      if ($this->email->send())
         //  $this->session->set_flashdata("email_sent","Succes in sending Email."); 
         redirect('Email', 'refresh');
      else
         $this->session->set_flashdata("email_sent", "Error in sending Email.");
      $this->load->view('email/contact');
   }
}
?>