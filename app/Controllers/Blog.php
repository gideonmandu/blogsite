<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Blog extends BaseController
{
    function post($slug)
    {
        $model = new BlogModel();

        $data['post'] = $model->getPosts($slug);

        echo view('templates/header', $data);
        echo view('blog/post');
        echo view('templates/footer');
    }

    function create()
    {
        helper('form');
        $model = new BlogModel();
        if (!$this->validate(
            // validate form input
            [
                'title' => 'required|min_length[3]|max_length[255]',
                'body' => 'required'
            ]
        )) {
            echo view('templates/header');
            echo view('blog/create');
            echo view('templates/footer');
        } else {
            // saving blog post
            $model->save(
                [
                    'title' => $this->request->getVar('title'),
                    'body' => $this->request->getVar('body'),
                    'slug' => url_title($this->request->getVar('title')),
                ]
            );
            $session = \Config\Services::session();
            $session->setFlashdata('success', 'New Post was created');
            return redirect()->to('/');
        }
    }

    function update($id)
    {
        helper('form');
        $model = new BlogModel();
        $data['post'] = $model->getPost($id);

        if (!$this->validate(
            // validate form input
            [
                'title' => 'required|min_length[3]|max_length[255]',
                'body' => 'required'
            ]
        )) {
            echo view('templates/header', $data);
            echo view('blog/update');
            echo view('templates/footer');
        } else {
            // saving blog post
            $model->save(
                [
                    'id' => $id,
                    'title' => $this->request->getVar('title'),
                    'body' => $this->request->getVar('body'),
                    'slug' => url_title($this->request->getVar('title')),
                ]
            );
            $session = \Config\Services::session();
            $session->setFlashdata('success', 'Post with id: ' . $id . ' was Updated');
            return redirect()->to('/blog/' . url_title($this->request->getVar('title')));
        }
    }

    function delete($id)
    {
        $model = new BlogModel();

        $data['post'] = $model->deletePost($id);
        $session = \Config\Services::session();
        $session->setFlashdata('success', 'Post with id: ' . $id . ' was Deleted');

        return redirect()->to('/');
    }

    function search()
    {
        helper('form');
        $model = new BlogModel();
        if (!$this->validate(
            // validate form input
            [
                'title' => 'required|min_length[1]|max_length[255]',
            ]
        )) {
            echo view('templates/header');
            echo view('pages/home');
            echo view('templates/footer');
        } else {
            // searching blog post
            // $data['news'] = $model->where(
            //     'title',
            //     $this->request->getVar('title')
            // )
            //     ->findAll();
            $title = $this->request->getVar('title');
            $data['news'] = $model->like('title', $title)
                ->findAll();
            echo view('templates/header', $data);
            echo view('pages/home');
            echo view('templates/footer');
        }
    }
}
