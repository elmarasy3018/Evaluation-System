<?php
class Logins extends CI_Controller
{
    public function login()
    {

        if ($this->session->super_logged_in or $this->session->logged_in) {
            redirect('home');
        }

        $data['title'] = 'Login Manager';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('templates/header.php', $data);
            $this->load->view('logins/login', $data);
            $this->load->view('templates/footer.php');
        } else {

            $name = $this->input->post('name');
            $password = $this->input->post('password');

            $check_login1 = $this->score_model->super_login($name, $password);

            if ($check_login1) {
                $this->session->set_flashdata('login_success', 'super login success');
                redirect('power');
            } else {

                $check_login2 = $this->score_model->login($name, $password);

                if ($check_login2) {

                    if ($this->session->report_id < 5) {

                        $this->session->set_flashdata('login_success', 'login success');

                        $data['waiting'] = $this->score_model->check_data($this->session->manager_id);
                        $data2 = json_encode($data);

                        if (strlen($data2) > 38) {

                            redirect('waiting');
                        } else {

                            redirect('report');
                        }
                    } else {

                        $this->session->unset_userdata('manager_id');
                        $this->session->unset_userdata('report_id');
                        $this->session->unset_userdata('name');
                        $this->session->unset_userdata('logged_in');
                        $this->session->unset_userdata('super_logged_in');
                        $this->session->set_flashdata('rejected', 'You got rejected more than 3 times');
                        redirect('scores');

                    }
                } else {

                    $this->session->set_flashdata('login_faild', 'login filed');
                    redirect('logins/login');
                }
            }
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('manager_id');
        $this->session->unset_userdata('report_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('super_logged_in');

        $this->session->set_flashdata('logged_out', 'You are Out');
        redirect('scores');
    }
}
