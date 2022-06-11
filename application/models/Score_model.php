<?php

class Score_model extends CI_Model{

    public function get_scores()
    {

        $query = $this->db->get('scores');

        return $query->result_array();
    }

    public function get_waiting()
    {

        $query = $this->db->get('waiting');

        return $query->result_array();
    }

    public function get_record()
    {

        $query = $this->db->get('record');

        return $query->result_array();
    }

    public function get_managers()
    {

        $query = $this->db->get('managers');

        return $query->result_array();
    }

    public function get_correction($id)
    {

        $query = $this->db->get_where('waiting', array('manager_id' => $id));

        return $query->result_array();

    }

    //create_score

    public function create_score()
    {

        $data = [
            'name' => $this->input->post('name'),
            'manager_id' => $this->session->manager_id,
            'first_half_score' => $this->input->post('first_half_score'),
            'first_half_survey' => $this->input->post('first_half_survey'),
            'second_half_score' => $this->input->post('second_half_score'),
            'second_half_survey' => $this->input->post('second_half_survey')
        ];

        return $this->db->insert('waiting', $data);
    }

    public function create_record()
    {

        $data = [
            'action' => 'Manager (' . $this->session->manager_id . ') Created Score For ' . $this->input->post('name') . ' As (' . $this->input->post('first_half_score') . ',' . $this->input->post('first_half_survey') . ',' . $this->input->post('second_half_score') . ',' . $this->input->post('second_half_survey') . ')',
            'time' => date("Y-m-d H:i:s")
        ];

        return $this->db->insert('record', $data);
    }

    //accept_correction

    public function accept_correction($id)
    {

        $query = $this->db->get_where('waiting', array('manager_id' => $id));
        foreach ($query->result() as $row) {
            $this->db->insert('scores', $row);
        }
    }

    public function accept_record($id)
    {

        $data = [
            'action' => 'The Direct Manager Approved Manager (' . $id . ') Scores.',
            'time' => date("Y-m-d H:i:s")
        ];

        return $this->db->insert('record', $data);
    }

    //delete_correction

    public function delete_correction($id)
    {

        $query = $this->db->delete('waiting', array('manager_id' => $id));

        return true;
    }

    public function delete_record($id)
    {

        $data = [
            'action' => 'The Direct Manager Rejected Manager (' . $id . ') Scores.',
            'time' => date("Y-m-d H:i:s")
        ];

        return $this->db->insert('record', $data);
    }

    public function edit_report($id)
    {
        $this->db->where("id", $id);
        $this->db->set('report_id', 'report_id+1', FALSE);
        $this->db->update('managers');

        return true;
    }

    public function get_reports($id)
    {

        $query = $this->db->get_where('reports', array('id' => $id));
        return $query->result_array();
        
    }

    public function check_data($id)
    {

        $query = $this->db->get_where('waiting', array('manager_id' => $id));
        return $query->result_array();

    }

    public function login($name, $password){


        $query = $this->db->get_where('managers', array ('name' => $name, 'password' =>$password));

        if ($query->num_rows() == 1){

            $manager = array(

                'manager_id'=> $query->row()-> id,
                'name'=> $query->row()-> name,
                'report_id'=> $query->row()-> report_id,
                'logged_in'=> true


            );

            $this->session->set_userdata($manager);
            return true;

        }else{

            return false;

        }

    }

    public function super_login($name, $password){


        $query = $this->db->get_where('super_manager', array ('name' => $name, 'password' =>$password));

        if ($query->num_rows() == 1){

            $manager = array(

                'name'=> $query->row()-> name,
                'super_logged_in'=> true

            );

            $this->session->set_userdata($manager);
            return true;

        }else{

            return false;

        }

    }
}
