<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'berita';

    public function getNews($slug = false)
    {
        if ($slug === false) {
            $this->orderBy('waktu', 'DESC');
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
