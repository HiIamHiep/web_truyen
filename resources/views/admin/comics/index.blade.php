@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.comics.create') }}" class="btn btn-primary">Thêm</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table-data">
                        <thead>
                        <th>#</th>
                        <th>Info</th>
                        <th>Thumb</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="#">View</a>
                            <a href="#">Preview</a>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{ route('api.comics.index') }}',
                dataType: 'json',
                data: {param1: 'value1'},
            })
                .success(function (response) {
                    $('#table-data').
                })
                .error(function (response) {

                });
        });
    </script>
@endpush
