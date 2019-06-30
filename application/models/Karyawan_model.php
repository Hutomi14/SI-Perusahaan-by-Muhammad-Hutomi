<?php

    class Karyawan_model extends CI_Model {

        public function semua(){
            $query = $this->db->select('*')
                              ->get('karyawan');
            return $query;
        }

        public function semuaKaryawanAktif(){
            $query = $this->db->select('*')
                              ->where('status', 'karyawan aktif')
                              ->get('karyawan');
            return $query;
        }        

        public function berdasarkanId($id){
            $query = $this->db->select('*')
                              ->where('id', $id)
                              ->get('karyawan');
            return $query;
        }

        public function berdasarkanEmail($email){
            $query = $this->db->select('*')
                              ->where('email', $email)
                              ->get('karyawan');
            return $query;
        }

        public function berdasarkanNama($nama){
            $query = $this->db->select('*')
                              ->like('CONCAT( nama_depan, " ", nama_belakang )', $nama, 'after')
                              ->get('karyawan');
            return $query;
        }

        public function create($data)
        {
            $this->db->insert('karyawan', $data);
        }

        public function update($id, $data){
            $query = $this->db->where('id', $id);
            $query = $this->db->update('karyawan', $data);
            
            return $query;
        }

    }