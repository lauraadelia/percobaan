<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    
    public function getCsvData($filename)
    {
        $csvdata = file_get_contents($filename);
        $exploded = explode("\n",$csvdata);
        $col = [];
        $getcol = explode(",",$exploded[0]);
        for ($i=0;$i<count($getcol);$i++)
        {
            $col[$getcol[$i]] = $i;
        }
        $result = [
            "column"=>$col,
            "result"=>[]
        ];
        unset($exploded[0]);
        foreach ($exploded as $k=>$v)
        {
            $data = explode(",",$v);
            array_push($result["result"],$data);
        }
        return $result;
    }

    public function getUserByNIK($nik)
    {
        $userdata = $this->getCsvData("users.csv");
        $result = [
            "column"=>$userdata["column"],
            "result"=>""
        ];
        foreach ($userdata["result"] as $k=>$v)
        {
            if ($v[$userdata["column"]["nik"]] == $nik)
            {
                $result["result"] = $v;
                return $result;
            }
        }
        return false;
    }

    public function getCatatanPerjalananByNIK($nik)
    {
        $userdata = $this->getCsvData("catatanperjalanan.csv");
        $result = [
            "column"=>$userdata["column"],
            "result"=>[]
        ];
        foreach ($userdata["result"] as $k=>$v)
        {
            if ($v[$userdata["column"]["nik"]] == $nik)
            {
                array_push($result["result"], $v);
            }
        }
        return $result;
    }

    public function getLatestData($nik)
    {
        $userdata = $this->getCsvData("catatanperjalanan.csv");
        $result = [
            "column"=>$userdata["column"],
            "result"=>[]
        ];
        $i = 0;
        foreach ($userdata["result"] as $k=>$v)
        {
            if ($i >= 7) break;
            if ($v[$userdata["column"]["nik"]] == $nik)
            {
                array_push($result["result"], $v);
            }
            $i++;
        }
        return $result;
    }
}
