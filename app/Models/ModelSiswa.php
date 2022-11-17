<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model{
    protected $table      = 'siswa';
    protected $primaryKey = 'nobp';

    protected $useAutoIncrement = false;

}