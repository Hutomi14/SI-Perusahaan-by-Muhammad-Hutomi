<?php

    class Kategori_model extends CI_Model {

        public function semua(){
            $query = $this->db->select('*')
                              ->get('kategori');
            return $query;
        }

        public function berdasarkanTipe($tipe){
            $query = $this->db->select('*')
                              ->where('tipe', $tipe)
                              ->get('kategori');
            return $query;
        }

        public function berdasarkanId($id){
            $query = $this->db->select('*')
                              ->where('id', $id)
                              ->get('kategori');
            return $query;
        }

        public function berdasarkanNama($kategori){
            $query = $this->db->select('*')
                              ->like('nama_kategori', $kategori, 'after')
                              ->get('kategori');
            return $query;
        }

        public function dropdownList($tipe)
        {
           $results = $this->db->select('id, nama_kategori')
                              ->where('status', 'aktif')
                              ->where('tipe', $tipe)
                              ->get('kategori')
                              ->result_array();

           	return array_column($results, 'nama_kategori', 'id');
        }

        public function update($id, $data){
            $query = $this->db->where('id', $id);
            $query = $this->db->update('kategori', $data);
            
            return $query;
        }

        public function create($data)
        {
            $this->db->insert('kategori', $data);
        }       

    }