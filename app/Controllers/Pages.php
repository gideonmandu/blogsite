<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Pages extends BaseController
{
    public function index()
    {
        $model = new BlogModel();
        $data['posts'] = $model->getPosts();

        echo view('templates/header');
        echo view('pages/home', $data);
        echo view('templates/footer');
    }

    function showme($page = 'home')
    {

        if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
            # handle page not found
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        echo view('templates/header');
        echo view('pages/' . $page);
        echo view('templates/footer');
    }
}
