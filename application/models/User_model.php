<?php

    class User_model extends CI_Model {

            public function create($data)
            {
                $this->db->insert('karyawan', $data);
            }

            public function login($email, $password){

                $query = $this->db->select('*')
                                  ->where('email', $email)
                                  ->get('karyawan');
                $row = $query->row();
                
                if($this->password->verify($password, $row->password)){
                        //jika password benar, langsung kembalikan data user ke controller
                        return $row;
                }else{
                        return false;
                }
            }
    }