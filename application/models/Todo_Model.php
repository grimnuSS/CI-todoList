<?php
class Todo_Model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function save($data = array()){
        return $this->db->insert('todos', $data);
    }

    public function getTodos($order = 'createdAt DESC'){
        return $this->db->order_by($order)->get('todos')->result();
    }
}