<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $nik = $this->request->getPost("nik");
        $password = $this->request->getPost("password");

        $userdata = $this->getCsvData("users.csv");
        foreach ($userdata["result"] as $k=>$v)
        {
            if ($v[$userdata["column"]["nik"]] == $nik && $v[$userdata["column"]["password"]] == $password)
            {
                session()->set("nik",$nik);
                return redirect()->to(base_url("/"));
            }
        }
        session()->setFlashdata("gagal","Salah NIK/Password");
        return redirect()->back();
    }

    public function register()
    {
        $nik = $this->request->getPost("nik");
        $nama = $this->request->getPost("nama");
        $password = $this->request->getPost("password");
        $confirmationPassword = $this->request->getPost("confirmation_password");

        // cek konfirmasi password
        if ($password != $confirmationPassword)
        {
            session()->setFlashdata("gagal","Konfirmasi password salah");
            return redirect()->back();
        }

        // cek jika nik udah terdaftar
        $userdata = $this->getCsvData("users.csv");
        foreach ($userdata["result"] as $k=>$v)
        {
            if ($v[$userdata["column"]["nik"]] == $nik)
            {
                session()->setFlashdata("gagal","NIK sudah terdaftar");
                return redirect()->back();
            }
        }

        // memasukan data baru
        file_put_contents("users.csv","\n$nik,$nama,$password",FILE_APPEND);
        session()->set("nik",$nik);
        return redirect()->to(base_url("/"));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url("/"));
    }
}
