<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Todo_Model');
    }

    public function index()
    {
        $data['todos'] = $this->Todo_Model->getTodos();
        $this->load->view('todos', $data);
    }

    public function save(){
        $todo = $this->input->post('todo');
        $endTime = $this->input->post('endTime');

        $this->load->library("form_validation");

        $this->form_validation->set_rules('todo', 'todo', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('endTime', 'End Time', 'required|trim');
        $this->form_validation->set_message(
            array(
                'required' => '{field} is required',
                'max_length' => '{field} can have max {param} characters'
            )
        );
        
        $validate = $this->form_validation->run();
        
        if($validate){
            $data = array(
                'todo' => $todo,
                'endTime' => $endTime,
                'createdAt' => date('Y-m-d H:i:s')
            );

            $insert = $this->Todo_Model->save($data);
            if($insert){
                redirect(base_url());
            } else {
                echo "Error";
            }
        } else {
            $viewData = new stdClass();
            $viewData->form_error = true;
            $this->load->view('todos', $viewData);
        }
    }
}
