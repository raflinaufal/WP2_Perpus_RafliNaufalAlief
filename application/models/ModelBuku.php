<?php defined('BASEPATH') or exit('No direct script access allowed');

class ModelBuku extends CI_Model
{
    // Manajemen buku
    public function getBuku()
    {
        return $this->db->get('buku');
    }

    public function bukuWhere($where)
    {
        return $this->db->get_where('buku', $where);
    }

    public function simpanBuku($data = null)
    {
        return $this->db->insert('buku', $data);
    }

    public function updateBuku($data = null, $where = null)
    {
        return $this->db->update('buku', $data, $where);
    }

    public function hapusBuku($where = null)
    {
       return $this->db->delete('buku', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('buku');
        return $this->db->get()->row($field);
    }

    // Manajemen kategori
    public function getKategori()
    {
        return $this->db->get('kategori');
    }

    public function kategoriWhere($where)
    {
        return $this->db->get_where('kategori', $where);
    }

    public function simpanKategori($data = null)
    {
        $this->db->insert('kategori', $data);
        return $this->db->insert_id();
    }

    public function getKategoriById($id)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id]);
    }

     public function updateKategori($id_kategori, $data)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }

    public function checkDuplicateKategori($nama_kategori, $id_kategori)
    {
        $this->db->where('nama_kategori', $nama_kategori);
        $this->db->where('id_kategori !=', $id_kategori);
        $query = $this->db->get('kategori');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cekDuplikatKategori($nama_kategori)
    {
        $this->db->where('nama_kategori', $nama_kategori);
        $query = $this->db->get('kategori');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusKategori($where = null)
    {
        $this->db->delete('kategori', $where);
    }

    // public function updateKategori($where = null, $data = null)
    // {
    //     $this->db->update('kategori', $data, $where);
    // }

    // Join
    public function joinKategoriBuku($where)
    {
        $this->db->select('buku.*, kategori.nama_kategori as kategori'); // Adjust field names as necessary
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getLimitBuku()
    {
        $this->db->limit(5);
        return $this->db->get('buku');
    }
}
