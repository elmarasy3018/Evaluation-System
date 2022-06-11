<?php

class Managers extends CI_Controller
{

    public function power()
    {

        if (!$this->session->super_logged_in) {
            redirect('logins/login');
        }

        $data['name'] = 'All Managers';

        $data['managers'] = $this->score_model->get_managers();

        $this->load->view('templates/header.php', $data);
        $this->load->view('managers/power', $data);
        $this->load->view('templates/footer.php');
    }

    public function correction($id)
    {

        if (!$this->session->super_logged_in) {
            redirect('logins/login');
        }

        // $data['name'] = 'All Correction';
        $data['waiting'] = $this->score_model->get_correction($id);
        $data2 = json_encode($data);
        if (strlen($data2) > 14) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('managers/correction', $data);
            $this->load->view('templates/footer.php');
        } else {

            $this->session->set_flashdata('no_score', 'this manager has not entered score yet');

            redirect('power');
        }
    }

    public function accept($id)
    {

        $this->score_model->accept_correction($id);
        $this->score_model->delete_correction($id);
        $this->score_model->accept_record($id);

        $this->session->set_flashdata('score_approved', 'the score has been approved');

        redirect('scores');
    }

    public function delete($id)
    {

        $this->score_model->delete_correction($id);
        $this->score_model->delete_record($id);
        $this->score_model->edit_report($id);

        $this->session->set_flashdata('score_rejected', 'the score has been rejected');

        redirect('power');
    }

    public function report()
    {

        if (! $this->session->logged_in){
            redirect('logins/login');
        }

        $data['name'] = 'All Reports';

        $data['reports'] = $this->score_model->get_reports($this->session->report_id);

        $this->load->view('templates/header.php', $data);
        $this->load->view('managers/report', $data);
        $this->load->view('templates/footer.php');
    }
    
}
