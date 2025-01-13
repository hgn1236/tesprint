<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function get_data_from_api() {
        $url = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';
        $username = 'tesprogrammer120125C21';
        $password = md5('bisacoding-' . date('d') . '-' . date('m') . '-' . date('y'));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    public function save_produk($data) {
        return $this->db->insert('produk', $data);
    }

    public function get_all_produk() {
        $this->db->select('produk.*, kategori.nama_kategori, status.nama_status');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');
        $this->db->join('status', 'produk.status_id = status.id_status');
        return $this->db->get()->result();
    }

    public function get_produk_by_status($status) {
        $this->db->select('produk.*, kategori.nama_kategori, status.nama_status');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');
        $this->db->join('status', 'produk.status_id = status.id_status');
        $this->db->where('status.nama_status', $status);
        return $this->db->get()->result();
    }

    public function update_produk($id, $data) {
        $this->db->where('id_produk', $id);
        return $this->db->update('produk', $data);
    }

    public function delete_produk($id) {
        $this->db->where('id_produk', $id);
        return $this->db->delete('produk');
    }
}