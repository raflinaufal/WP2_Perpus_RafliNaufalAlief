<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    //manajemen Buku
    public function index()
    {
        $data['judul'] = 'Data Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|min_length[3]', [
            'required' => 'Judul Buku harus diisi',
            'min_length' => 'Judul buku terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
            'required' => 'Nama pengarang harus diisi',
        ]);
        $this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required|min_length[3]', [
            'required' => 'Nama pengarang harus diisi',
            'min_length' => 'Nama pengarang terlalu pendek'
        ]);
        $this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required|min_length[3]', [
            'required' => 'Nama penerbit harus diisi',
            'min_length' => 'Nama penerbit terlalu pendek'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun Terbit', 'required|min_length[3]|max_length[4]|numeric', [
            'required' => 'Tahun terbit harus diisi',
            'min_length' => 'Tahun terbit terlalu pendek',
            'max_length' => 'Tahun terbit terlalu panjang',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('isbn', 'Nomor ISBN', 'required|min_length[3]|numeric', [
            'required' => 'Nama ISBN harus diisi',
            'min_length' => 'Nama ISBN terlalu pendek',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
            'required' => 'Stok harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'judul_buku' => $this->input->post('judul_buku', true),
                'id_kategori' => $this->input->post('id_kategori', true),
                'pengarang' => $this->input->post('pengarang', true),
                'penerbit' => $this->input->post('penerbit', true),
                'tahun_terbit' => $this->input->post('tahun', true),
                'isbn' => $this->input->post('isbn', true),
                'stok' => $this->input->post('stok', true),
                'dipinjam' => 0,
                'dibooking' => 0,
                'image' => $gambar
            ];

            if ($this->ModelBuku->simpanBuku($data)) {
            $this->session->set_flashdata('success_message', 'Buku berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error_message', 'Buku gagal ditambahkan.');
        }
        redirect('buku');
        }
    }

    public function hapusBuku()
    {
    $where = ['id' => $this->uri->segment(3)];
    if ($this->ModelBuku->hapusBuku($where)) {
        $this->session->set_flashdata('success_message', 'Buku berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error_message', 'Buku gagal dihapus.');
    }
    redirect('buku');
    }


    public function ubahBuku()
    {
    $data['judul'] = 'Ubah Data Buku';
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['buku'] = $this->ModelBuku->bukuWhere(['id' => $this->uri->segment(3)])->result_array();
    $kategori = $this->ModelBuku->joinKategoriBuku(['buku.id' => $this->uri->segment(3)])->result_array();
    foreach ($kategori as $k) {
        $data['id'] = $k['id_kategori'];
        $data['k'] = $k['kategori'];
    //     // Cek nilai variabel sebelum validasi form
    // var_dump($data);
    }
    $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

    $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|min_length[3]', [
        'required' => 'Judul Buku harus diisi',
        'min_length' => 'Judul buku terlalu pendek'
    ]);
    $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
        'required' => 'Nama pengarang harus diisi',
    ]);
    $this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required|min_length[3]', [
        'required' => 'Nama pengarang harus diisi',
        'min_length' => 'Nama pengarang terlalu pendek'
    ]);
    $this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required|min_length[3]', [
        'required' => 'Nama penerbit harus diisi',
        'min_length' => 'Nama penerbit terlalu pendek'
    ]);
    $this->form_validation->set_rules('tahun', 'Tahun Terbit', 'required|min_length[3]|max_length[4]|numeric', [
        'required' => 'Tahun terbit harus diisi',
        'min_length' => 'Tahun terbit terlalu pendek',
        'max_length' => 'Tahun terbit terlalu panjang',
        'numeric' => 'Hanya boleh diisi angka'
    ]);
    $this->form_validation->set_rules('isbn', 'Nomor ISBN', 'required|min_length[3]|numeric', [
        'required' => 'Nama ISBN harus diisi',
        'min_length' => 'Nama ISBN terlalu pendek',
        'numeric' => 'Yang anda masukan bukan angka'
    ]);
    $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
        'required' => 'Stok harus diisi',
        'numeric' => 'Yang anda masukan bukan angka'
    ]);

    //konfigurasi sebelum gambar diupload
    $config['upload_path'] = './assets/img/upload/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = '3000';
    $config['max_width'] = '1024';
    $config['max_height'] = '1000';
    $config['file_name'] = 'img' . time();

    //memuat atau memanggil library upload
    $this->load->library('upload', $config);

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/ubah_buku', $data);
        $this->load->view('templates/footer');
    } else {
        if ($this->upload->do_upload('image')) {
            $image = $this->upload->data();
            unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
            $gambar = $image['file_name'];
        } else {
            $gambar = $this->input->post('old_pict', TRUE);
        }

        $data = [
            'judul_buku' => $this->input->post('judul_buku', true),
            'id_kategori' => $this->input->post('id_kategori', true),
            'pengarang' => $this->input->post('pengarang', true),
            'penerbit' => $this->input->post('penerbit', true),
            'tahun_terbit' => $this->input->post('tahun', true),
            'isbn' => $this->input->post('isbn', true),
            'stok' => $this->input->post('stok', true),
            'image' => $gambar
        ];

        if ($this->ModelBuku->updateBuku($data, ['id' => $this->input->post('id')])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data buku berhasil diubah</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data buku gagal diubah</div>');
        }

        redirect('buku');
      } 
    }


    //manajemen kategori
    public function kategori()
    {
        $data['judul'] = 'Kategori Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', [
            'required' => 'Nama Kategori harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_kategori = $this->input->post('nama_kategori', TRUE);
            
            // Check for duplicates
            if ($this->ModelBuku->cekDuplikatKategori($nama_kategori)) {
                $this->session->set_flashdata('error', 'Kategori sudah ada');
                redirect('buku/kategori');
            } else {
                $data = [
                    'nama_kategori' => $nama_kategori
                ];

                $this->ModelBuku->simpanKategori($data);
                $this->session->set_flashdata('success', 'Data berhasil ditambah');
                redirect('buku/kategori');
            }
        }
    }



    
    public function ubahKategori($id_kategori)
        {
            $data['judul'] = 'Ubah Kategori';
            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['kategori'] = $this->ModelBuku->getKategoriById($id_kategori)->row();

            $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required|trim|callback_check_duplicate_kategori', [
                'required' => 'Nama Kategori harus diisi'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('buku/ubah_kategori', $data);
                $this->load->view('templates/footer');
            } else {
                $update_data = [
                    'nama_kategori' => $this->input->post('kategori', TRUE)
                ];

                $this->ModelBuku->updateKategori($id_kategori, $update_data);
                $this->session->set_flashdata('success', 'Kategori berhasil diubah');
                redirect('buku/kategori');
            }
        }

    public function check_duplicate_kategori($kategori)
    {
        $id_kategori = $this->input->post('id_$id_kategori');
        $result = $this->ModelBuku->checkDuplicateKategori($kategori, $id_kategori);

        if ($result) {
            $this->form_validation->set_message('check_duplicate_kategori', 'Kategori sudah ada.');
            return false;
        } else {
            return true;
        }
    }


     public function delete($id_kategori)
    {
        $sql="DELETE FROM kategori WHERE id_kategori='$id_kategori'";
        $query = $this->db->query($sql);
        // echo $sql;exit;
         $this->session->set_flashdata('success', 'Data berhasil dihapus dengan ID: ' . $id_kategori);   
        redirect(base_url() . "buku/kategori/");
    }
}