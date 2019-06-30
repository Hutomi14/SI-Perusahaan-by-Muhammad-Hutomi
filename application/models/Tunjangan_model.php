<?php

    class Tunjangan_model extends CI_Model {

        public function semua(){
            // $query = $this->db->select('karyawan.nama_depan, karyawan.nama_belakang, kategori.nama_kategori, tunjangan.status, tunjangan.id')
            $query = $this->db->select('karyawan.nama_depan, karyawan.nama_belakang, kategori.nama_kategori, tunjangan.*')
                              ->join('kategori', 'kategori.id = tunjangan.id_kategori')
                              ->join('karyawan', 'karyawan.id = tunjangan.id_karyawan')
                              ->get('tunjangan');
            return $query;
        }

        public function berdasarkanId($id){
            $query = $this->db->select('karyawan.nama_depan, karyawan.nama_belakang, kategori.nama_kategori, tunjangan.*')
                              ->join('kategori', 'kategori.id = tunjangan.id_kategori')
                              ->join('karyawan', 'karyawan.id = tunjangan.id_karyawan')
                              ->where('tunjangan.id', $id)
                              ->get('tunjangan');
            return $query;
        }

        public function dropdownList()
        {
           $results = $this->db->select('id, nama_departemen')
                              ->where('status', 'aktif')
                              ->get('tunjangan')
                              ->result_array();

           	return array_column($results, 'nama_departemen', 'id');
        }

        public function update($id, $data){
            $query = $this->db->where('id', $id);
            $query = $this->db->update('tunjangan', $data);
            
            return $query;
        }

        public function create($data)
        {
            $this->db->insert('tunjangan', $data);
        }       

    }