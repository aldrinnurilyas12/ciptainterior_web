<?php
require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

class Auth extends CI_Model
{

    function get_user($id_customer)
    {
        $query = "SELECT * FROM customer WHERE id_customer = '$id_customer'";
        return $this->db->query($query)->result();
    }

    public function get_username($username)
    {
        $get_username = $this->db->query("SELECT username FROM customer
        WHERE username='$username';");
        return $get_username;
    }

    public function get_email($email)
    {
        $get_user_email = $this->db->query("SELECT email FROM customer
        WHERE email ='$email'");
        return $get_user_email;
    }



    function login_user($username, $password)
    {
        $query = $this->db->query("SELECT username,nama_lengkap, email, id_customer, telepon, alamat, 
        image, cp.register_id, password FROM customer as cst 
        LEFT JOIN customers_password as cp 
        ON cst.register_id = cp.register_id
        WHERE username = '$username';");
        if ($query->num_rows() > 0) {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('nama_lengkap', $data_user->nama_lengkap);
                $this->session->set_userdata('email', $data_user->email);
                $this->session->set_userdata('id_customer', $data_user->id_customer);
                $this->session->set_userdata('telepon', $data_user->telepon);
                $this->session->set_userdata('alamat', $data_user->alamat);
                $this->session->set_userdata('image', $data_user->image);
                $this->session->set_userdata('register_id', $data_user->register_id);
                $this->session->set_userdata('is_login', TRUE);

                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    function cek_login()
    {
        if ($this->session->userdata('is_login')) {
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

    function register($username, $id_customer, $nama_lengkap, $alamat, $email, $telepon, $profile_picture)
    {

        $id_customer = Uuid::uuid4()->toString();
        $data_reg = array(
            'username' => $username,
            'id_customer' => $id_customer,
            'nama_lengkap' => $nama_lengkap,
            'alamat' => $alamat,
            'email' => $email,
            'telepon' => $telepon,
            'image' => $profile_picture
        );
        $this->db->insert('customer', $data_reg);
        return $data_reg;
    }

    function register_password($password)
    {

        $data_pass = array(
            'password' => password_hash($password, PASSWORD_BCRYPT)
        );
        $this->db->insert('customers_password', $data_pass);
        return $data_pass;
    }

    function kodecust($id_customer)
    {
        $id_customer = UUid::uuid4()->toString();
        return $id_customer;
    }
}
