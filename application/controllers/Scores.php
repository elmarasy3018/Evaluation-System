<?php

class Scores extends CI_Controller
{

    public function index()
    {

        $data['name'] = 'All Scores';

        $data['scores'] = $this->score_model->get_scores();

        $this->load->view('templates/header.php', $data);
        $this->load->view('scores/index', $data);
        $this->load->view('templates/footer.php');
    }

    public function pending()
    {

        if (!$this->session->super_logged_in) {
            redirect('logins/login');
        }

        $data['name'] = 'All Waiting';

        $data['waiting'] = $this->score_model->get_waiting();

        $this->load->view('templates/header.php', $data);
        $this->load->view('scores/pending', $data);
        $this->load->view('templates/footer.php');
    }

    public function record()
    {

        $data['action'] = 'All Record';

        $data['record'] = $this->score_model->get_record();

        $this->load->view('templates/header.php', $data);
        $this->load->view('scores/record', $data);
        $this->load->view('templates/footer.php');
    }

    public function evaluation()
    {

        if (!$this->session->logged_in) {
            redirect('logins/login');
        }

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('first_half_score', 'First Half (Score)', 'required');
        $this->form_validation->set_rules('first_half_survey', 'First Half (Survey)', 'required');
        $this->form_validation->set_rules('second_half_score', 'Second Half (Score)', 'required');
        $this->form_validation->set_rules('second_half_survey', 'Second Half (Survey)', 'required');

        if ($this->form_validation->run() === FALSE) {

            $data['name'] = 'Creat Evaluation';
            $this->load->view('templates/header.php', $data);
            $this->load->view('scores/evaluation', $data);
            $this->load->view('templates/footer.php');
        } else {
            $this->score_model->create_score();
            $this->score_model->create_record();

            $this->session->set_flashdata('score_created', 'the score has been created');
            redirect('scores/evaluation');
        }
    }
}