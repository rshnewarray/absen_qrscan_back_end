<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class AbsenModel extends Model
{
    protected $table = "absen";
    protected $primaryKey = 'id_absen';
    protected $allowedFields = [
        'id_absen',
        'id_jadwal',
        'id_user',
        'waktu'
    ];

    public function getAbsen() {
        return $this->db->table('absen')
            ->join('mahasiswa', 'absen.id_user = mahasiswa.id_user')
            ->join('jadwalkuliah', 'absen.id_jadwal = jadwalkuliah.id_jadwal')
            ->join('matakuliah', 'jadwalkuliah.id_mk = matakuliah.id_mk')
            ->get()->getResultArray();
        // return "invalid";
    }
 
    public function checkLogin($username, $password) {
        $query = $this->db->table('user')->where(['username' => $username, 'password' => $password]);
        return $query->countAllResults();
    }
}