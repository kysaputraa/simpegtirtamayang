<?php

namespace App\Filters;

use App\Models\GlobalModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CekFromDB implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        $request = service('uri');
        $globalModel = new GlobalModel();

        $levelManagement = $globalModel->getLevelManagement(session()->get('level'))->getResult();
        $variables = array_column($levelManagement, 'menu');
        $firstSegment = $request->getSegment(1);

        if (!in_array(strtolower($firstSegment), $variables) and session()->get('level') != 1) {
            session()->setFlashdata('gagal', 'You Are UnAuthorized to look this page !');
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
