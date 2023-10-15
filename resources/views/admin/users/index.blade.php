@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form class="form-horizontal" id="form-submit">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <div class="col-3">
                                <select class="form-control select-filter" name="role" id="role">
                                    <option selected >All</option>
                                    @foreach($roles as $role => $value)
                                        <option value="{{ $value }}" @if( (string)$value === $selectedRole) selected @endif>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-hover table-centered mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Info</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $each)
                                <tr>
                                    <td>
                                        <a href="{{ route("admin.$table.show", $each) }}">{{ $each->id }}</a>
                                    </td>
                                    <td><img src="{{ $each->avatar }}" height="100"></td>
                                    <td>
                                        {{ $each->name }}
                                        <br>
                                        <a href="mailto:{{ $each->email }}">{{ $each->email }}</a>
                                    </td>
                                    <td>
                                        {{ $each->gender_name}}
                                    </td>
                                    <td>
                                        {{ $each->role_name }}
                                    </td>
                                    <td>
                                        <form action="{{ route("admin.$table.destroy", $each) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav>
                        <ul class="pagination pagination-rounded mb-0">
                            {{ $data->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(".select-filter").change(function(){
                $("#form-submit").submit();
            })
        })
    </script>
@endpush
