<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_katalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_katalog');
        $this->load->model('m_pesanan_pelanggan');
        $this->load->model('m_order');
        $this->load->model('m_boking');
    }
    public function index()
    {
        $this->form_validation->set_rules('datein', 'Date-In', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('kursi', 'Kursi', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'tempat' => $this->m_order->select_tempat(),
                'boking' => $this->m_boking->detail_boking(),
                'produk' => $this->m_katalog->produk(),
                'akun' => $this->m_katalog->akun(),
                'kritik' => $this->m_katalog->kritik()
            );
            $this->load->view('Pelanggan/head');
            $this->load->view('Pelanggan/header');
            $this->load->view('Pelanggan/vkatalog', $data);
            $this->load->view('Pelanggan/footer');
        } else {
            $datein = $this->input->post('datein');
            $kursi = $this->input->post('kursi');
            $this->cek_boking->cek_boking($datein, $kursi);
            redirect('Pelanggan/c_katalog');
        }
    }
    public function katalog_makanan()
    {
        $data = array(
            'produk' => $this->m_katalog->select_makanan()
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/header');
        $this->load->view('Pelanggan/vkatalog_makanan', $data);
        $this->load->view('Pelanggan/footer');
    }
    public function katalog_minuman()
    {
        $data = array(
            'produk' => $this->m_katalog->select_minuman()
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/header');
        $this->load->view('Pelanggan/vkatalog_minuman', $data);
        $this->load->view('Pelanggan/footer');
    }
    public function cart()
    {
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/header');
        $this->load->view('Pelanggan/vcart');
        $this->load->view('Pelanggan/footer');
    }
    public function add_cart()
    {
        $this->pelanggan_login->cek_halaman();
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => $this->input->post('qty'),
            'picture' => $this->input->post('picture')

        );
        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }
    //hapus data cart
    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('Pelanggan/c_katalog/cart');
    }

    //update data cart dengan menambah dan mengurangi jumlah barang
    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid'  => $items['rowid'],
                'qty'    => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('Pelanggan/c_katalog/cart');
    }

    //order with boking tempat
    public function checkout()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('catatan', 'Catatan', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('datein', 'Catatan', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('pembayaran', 'Catatan', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'tempat' => $this->m_order->select_tempat()
            );
            $this->load->view('Pelanggan/head');
            $this->load->view('Pelanggan/header');
            $this->load->view('Pelanggan/vcheckout', $data);
            $this->load->view('Pelanggan/footer');
        } else {
            $datein = $this->input->post('datein');
            $kursi = $this->input->post('kursi');
            $this->cek_boking->pesan($datein, $kursi);
        }
    }
    public function pesan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('catatan', 'Catatan', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('pembayaran', 'Catatan', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'tempat' => $this->m_order->select_tempat()
            );
            $this->load->view('Pelanggan/head');
            $this->load->view('Pelanggan/header');
            $this->load->view('Pelanggan/vcheckout', $data);
            $this->load->view('Pelanggan/footer');
        } else {
            $this->m_boking->pesan();
            redirect('Pelanggan/c_katalog/pesanan_saya');
        }
    }

    //pesanan saya
    public function pesanan_saya()
    {
        $this->pelanggan_login->cek_halaman();
        $data = array(
            'pesanan' => $this->m_pesanan_pelanggan->select_pesanan()
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/header');
        $this->load->view('Pelanggan/vpesanan', $data);
        $this->load->view('Pelanggan/footer');
    }
    public function detail_pesanan($id_transaksi)
    {
        $data = array(
            'detail' => $this->m_pesanan_pelanggan->detail_pesanan($id_transaksi)
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/header');
        $this->load->view('Pelanggan/vdetail_pesanan', $data);
        $this->load->view('Pelanggan/footer');
    }
    public function batalkan_pesanan($id_transaksi)
    {
        $this->m_pesanan_pelanggan->batalkan_pesanan($id_transaksi);
        redirect('Pelanggan/c_katalog/pesanan_saya');
    }
    public function akun_pelanggan()
    {
        $data = array(
            'akun' => $this->m_katalog->akun()
        );
        $this->pelanggan_login->cek_halaman();
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/header');
        $this->load->view('Pelanggan/vakun', $data);
        $this->load->view('Pelanggan/footer');
    }
    //upload bukti pembayaran pesanan pelanggan
    public function bayar($id_transaksi)
    {
        $config['upload_path']          = './asset/bukti/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 3000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti')) {
            $data = array(
                'pesanan' => $this->m_pesanan_pelanggan->select_pesanan()
            );
            $this->load->view('Pelanggan/head');
            $this->load->view('Pelanggan/header');
            $this->load->view('Pelanggan/vpesanan', $data);
            $this->load->view('Pelanggan/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'bayar' => $upload_data['file_name']
            );
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->update('detail_pembayaran', $data);
            redirect('pelanggan/c_katalog/pesanan_saya');
        }
    }
    public function edit_akun($id_pelanggan)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        $this->db->where('pelanggan.id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan', $data);
        redirect('Pelanggan/c_katalog/akun_pelanggan');
    }

    public function detail_boking()
    {
        $data = array(
            'title' => 'Data Boking',
            'tempat' => $this->m_boking->detail_boking()
        );
        $this->load->view('Pelanggan/head');
        $this->load->view('Pelanggan/header');
        $this->load->view('Pelanggan/vkatalog', $data);
        $this->load->view('Pelanggan/footer');
    }

    //kritik
    public function kritik()
    {
        $data = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'isi_kritik' => $this->input->post('kritik')
        );
        $this->db->insert('kritik', $data);
        redirect('pelanggan/c_katalog');
    }
}
