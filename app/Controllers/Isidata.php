<?php

namespace App\Controllers;

class Isidata extends BaseController
{
    public function index()
    {
        $user = $this->getUserByNIK(session()->get("nik"));
        return view("isidata",[
            "user"=>$user
        ]);
    }

    public function add()
    {
        $nik = session()->get("nik");
        $tanggal = $this->request->getPost("tanggal");
        $waktu = $this->request->getPost("waktu");
        $lokasi = $this->request->getPost("lokasi");
        $suhu = $this->request->getPost("suhu");

        file_put_contents("catatanperjalanan.csv","\n$tanggal,$waktu,$lokasi,$suhu,$nik",FILE_APPEND);

        session()->setFlashdata("berhasil","Data berhasil disimpan");
        return redirect()->back();
    }
}
