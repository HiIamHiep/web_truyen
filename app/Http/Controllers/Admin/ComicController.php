<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ComicController extends Controller
{
    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = Comic::query();
        $this->table = (new Comic())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        $data = $this->model->get();

        return view('admin.comics.index',[
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.comics.create');
    }
}
