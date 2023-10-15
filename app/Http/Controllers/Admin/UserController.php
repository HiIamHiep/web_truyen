<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = User::query();
        $this->table = (new User())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index(Request $request)
    {

        $selectedRole = $request->get('role');

        $query = $this->model
            ->latest();

        //Kiểm tra xem có lọc theo role không , nếu có thì thực hiện
        if(!empty($selectedRole)  && $selectedRole !== 'All' ) {
            $query->where('role', $selectedRole);
        }
        //Trường hợp 0 là empty
        if($selectedRole === '0') {
            $query->where('role', $selectedRole);
        }

        $data = $query->paginate(10);

//        $data = $this->model
//            ->when($request->has('role'), function ($q) use ($request) {
//                return $q->where('role', $request->get('role'));
//            })
//            ->latest()
//            ->paginate();

        $roles = UserRoleEnum::asArray();

//        dd($selectedRole);

        return view("admin.$this->table.index", [
            'data' => $data,
            'roles' => $roles,
            'selectedRole' => $selectedRole,
        ]);
    }

    public function show()
    {

    }

    public function destroy($userId)
    {
        $this->model
            ->find($userId)
            ->delete();

        return redirect()->back();
    }
}
