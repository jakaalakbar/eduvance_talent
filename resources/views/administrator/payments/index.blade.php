@extends('layouts.administrator.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="card-title">Users</h5>
                </div>
                <div>
                    <form action="{{ route('admin.users') }}" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari...">
                            <button type="submit" class="input-group-text" id="basic-addon1">Ayo Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0">
                    <thead>
                        <tr class="border-bottom border-primary border-0">
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        {{-- @foreach ($users as $user)
                            <tr>
                                <th scope="row">
                                    {{ $user->name }}
                                </th>
                                <td>
                                    {{ $user->username }}
                                </td>
                                <td>{{ $user->email }}
                                </td>
                                <td>
                                    <span class="badge text-bg-light fs-2 py-1 px-2">
                                        {{ $user->is_active == 1 ? 'Aktif' : 'Non-Active' }}
                                    </span>
                                </td>
                                <td>
                                    @if ($user->role == 0)
                                        <span class="badge text-bg-light fs-2 py-1 px-2">
                                            Admin
                                        </span>
                                    @endif
                                    @if ($user->role == 1)
                                        <span class="badge text-bg-light fs-2 py-1 px-2">
                                            Student
                                        </span>
                                    @endif
                                    @if ($user->role == 2)
                                        <span class="badge text-bg-light fs-2 py-1 px-2">
                                            unknown
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <a href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-sm btn-danger"
                                        data-confirm-delete="true">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white">
                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>
@endsection
