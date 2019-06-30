<?php

    class Posisi_model extends CI_Model {

        public function semua(){
            $query = $this->db->select('*')
                              ->get('posisi');
            return $query;
        }

        public function berdasarkanId($id){
            $query = $this->db->select('*')
                              ->where('id', $id)
                              ->get('posisi');
            return $query;
        }

        public function dropdownList()
        {
           $results = $this->db->select('id, nama_posisi')
                               ->where('status', 'aktif')
                               ->get('posisi')
                               ->result_array();

           	return array_column($results, 'nama_posisi', 'id');
        }

        public function update($id, $data){
            $query = $this->db->where('id', $id);
            $query = $this->db->update('posisi', $data);
            
            return $query;
        }

        public function create($data)
        {
            $this->db->insert('posisi', $data);
        }        

    }