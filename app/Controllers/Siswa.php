<?php

namespace App\Controllers;

use App\Models\ModelSiswa;


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

    public function simpandata() {
         
        if($this->request->isAJAX()) {

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nobp' => [
                    'label' => 'Nomor BP',
                    'rules' => 'required|is_unique[siswa.nobp]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama, silahkan coba yang lain'
                    ]
                    ],
                    'nama' => [
                        'label' => 'Nama Murid',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ]
            ]);

            if(!$valid){

                $msg = [
                    'error' => [
                        'nobp' => $validation->getError('nobp'),
                        'nama' => $validation->getError('nama')
                        // 'tempat' => $validation->getError('tempat')
                    ]
                    ];

                }else{
                    $simpandata = [
                        'nobp' => $this->request->getPost('nobp'),
                        'nama' => $this->request->getPost('nama'),
                        'tmplahir' => $this->request->getPost('tempat'),
                        'tgllahir' => $this->request->getPost('tgllahir'),
                        'jenkel' => $this->request->getPost('jenkel')
                    ];
 
                    $ssw = new ModelSiswa;

                    $ssw->insert($simpandata);

                    $msg = [
                        'sukses' => 'Data Berhasil Tersimpan'
                    ];

                }
                echo json_encode($msg);
        }else {
            exit('Maaf Tidak Dapat Di Proses');
        }
    }
}