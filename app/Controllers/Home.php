<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get("nik"))
        {
            $user = $this->getUserByNIK(session()->get("nik"));
            $getlatestdata = $this->getLatestData(session()->get("nik"));
            return view("dashboard", [
                "user"=>$user,
                "latestdata"=>$getlatestdata
            ]);
        }
        return redirect()->to(base_url("/login"));
    }
}
