@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Users
                        <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm float-end text-white">
                            Add User
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->role_as == 1)
                                                <span class="badge bg-success text-white">Admin</span>
                                            @else
                                                <span class="badge bg-info text-white">User</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/users/edit/' . $user->id) }}"
                                                class="btn btn-primary text-white btn-sm">Edit</a>
                                            <a href="{{ url('admin/users/delete/' . $user->id) }}"
                                                class="btn btn-danger text-white btn-sm"
                                                onclick="return confirm('Are you sure you want to delete user ?')">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No User Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
