<?php

namespace App\Controllers;

class Catatanperjalanan extends BaseController
{
    public function index()
    {
        $user = $this->getUserByNIK(session()->get("nik"));
        $catatanperjalanan = $this->getCatatanPerjalananByNIK(session()->get("nik"));
        return view("catatanperjalanan",[
            "user"=>$user,
            "catatanperjalanan"=>$catatanperjalanan
        ]);
    }
}
