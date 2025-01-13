<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_model');
    }

    public function index() {
        $data['produk'] = $this->Produk_model->get_produk_by_status('bisa dijual');
        $this->load->view('produk/index', $data);
    }

    public function add() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'nama_produk' => $this->input->post('nama_produk'),
                    'harga' => $this->input->post('harga'),
                    'kategori_id' => $this->input->post('kategori_id'),
                    'status_id' => $this->input->post('status_id')
                ];
                $this->Produk_model->save_produk($data);
                redirect('produk');
            }
        }
        $this->load->view('produk/add');
    }

    public function edit($id ) {
        $data['produk'] = $this->Produk_model->get_produk_by_id($id);
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $update_data = [
                    'nama_produk' => $this->input->post('nama_produk'),
                    'harga' => $this->input->post('harga'),
                    'kategori_id' => $this->input->post('kategori_id'),
                    'status_id' => $this->input->post('status_id')
                ];
                $this->Produk_model->update_produk($id, $update_data);
                redirect('produk');
            }
        }
        $this->load->view('produk/edit', $data);
    }

    public function delete($id) {
        if ($this->Produk_model->delete_produk($id)) {
            redirect('produk');
        }
    }
}