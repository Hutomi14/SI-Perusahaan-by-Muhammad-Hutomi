<?php

    class Departemen_model extends CI_Model {

        public function semua(){
            $query = $this->db->select('*')
                              ->get('departemen');
            return $query;
        }

        public function melaluiId($id){
            $query = $this->db->select('*')
                              ->where('id', $id)
                              ->get('departemen');
            return $query;
        }

        public function dropdownList()
        {
           $results = $this->db->select('id, nama_departemen')
                              ->where('status', 'aktif')
                              ->get('departemen')
                              ->result_array();

           	return array_column($results, 'nama_departemen', 'id');
        }

        public function update($id, $data){
            $query = $this->db->where('id', $id);
            $query = $this->db->update('departemen', $data);
            
            return $query;
        }

        public function create($data)
        {
            $this->db->insert('departemen', $data);
        }       

    }