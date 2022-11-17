<?php

namespace App\Controllers;

use App\Models\ModelSiswa;
use CodeIgniter\Model;

class Siswa extends BaseController
{
    public function index()
    {
        return view('siswa/viewtampildata');
    }

    public function ambildata() {
        if($this->request->isAJAX()){
        $ssw = new ModelSiswa;
        $data = [
            'tampildata' => $ssw->findAll()
        ];

        $msg = [
            'data' => view('siswa/datasiswa', $data)
        ];

        echo json_encode($msg);
        }else {
            exit('Maaf Tidak Dapat Di Proses');
        }
    }

    public function formtambah() {
        if($this->request->isAJAX()) {
            $msg = [
                'data' => view('siswa/modaltambah')
            ];
    
            echo json_encode($msg);

        } else {
            exit('Maaf Tidak Dapat Di Proses');
        }
    }
}