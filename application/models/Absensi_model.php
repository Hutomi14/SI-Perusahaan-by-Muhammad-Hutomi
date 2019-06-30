<?php

    class Absensi_model extends CI_Model {

        public function semua(){
            $this->db->query('SET lc_time_names = "id_ID"');
            $query = $this->db->select('*, DAYNAME(waktu) AS nama_hari')
                              ->order_by('waktu','asc')
                              ->get('absensi');
            return $query;
        }

        public function berdasarkanId($id){
            $query = $this->db->select('*')
                              ->where('id', $id)
                              ->get('absensi');
            return $query;
        }

        public function create($data)
        {
            $this->db->insert('absensi', $data);
        }

        public function update($id, $data){
            $query = $this->db->where('id', $id);
            $query = $this->db->update('absensi', $data);
            
            return $query;
        }

    }