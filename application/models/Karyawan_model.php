<?php

    class Karyawan_model extends CI_Model {

        public function create($data)
        {
            $this->db->insert('karyawan', $data);
        }

        public function semua(){
            $query = $this->db->select('*')
                              ->get('karyawan');
            return $query;
        }

        public function melaluiId($id){
            $query = $this->db->select('*')
                              ->where('id', $id)
                              ->get('karyawan');
            return $query;
        }

        public function update($id, $data){
            $query = $this->db->where('id', $id);
            $query = $this->db->update('karyawan', $data);
            
            return $query;
        }

    }