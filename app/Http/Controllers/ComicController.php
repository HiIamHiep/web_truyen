<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ComicController extends Controller
{
    private object $model;

    public function __construct()
    {
        $this->model = Comic::query();
    }

    public function index()
    {
        return $this->model->paginate();

    }
}
