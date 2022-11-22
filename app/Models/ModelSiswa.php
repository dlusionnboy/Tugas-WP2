<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model{
    protected $table      = 'siswa';
    protected $primaryKey = 'nobp';

    protected $allowedFields = ['nobp','nama','tmplahir','tgllahir','jenkel'];

    protected $useAutoIncrement = false;

}