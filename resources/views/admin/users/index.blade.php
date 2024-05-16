@extends('layouts.app')
@section('main')
@if(session('create'))
<script>
    Swal.fire({
    title: 'Success',
    text: '{{ session('create') }}',
    icon: 'success',
    showConfirmButton: false
});
</script>
@endif
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5><b>Table Users</b></h5>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-plus-circle-fill"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Store Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3 needs-validation" novalidate method="POST">
                            @csrf
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Name</label>
                                <input type="text" class="form-control" id="validationCustom01" name="name" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="validationCustom02" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustomUsername" class="form-label">Role</label>
                                <select class="form-select" aria-label="Default select example" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Password</label>
                                <input type="password" class="form-control" id="validationCustom03" name="password"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Password Confirm</label>
                                <input type="password" class="form-control" id="validationCustom03"
                                    name="password_confirmation" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill"></i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table datatable table-hover table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->role}}</td>
                        <td>
                            <div class="d-flex">
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editUsers{{$item->id}}">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editUsers{{$item->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{url('admin/user/'.$item->id)}}"
                                                class="row g-3 needs-validation" novalidate method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body row">
                                                    <div class="col-md-4">
                                                        <label for="validationCustom01" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            name="name" value="{{$item->name}}" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="validationCustom02" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                            id="validationCustom02" value="{{$item->email}}" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="validationCustomUsername"
                                                            class="form-label">Role</label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="role">
                                                            <option value="{{$item->role}}">{{$item->role}}</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="staff">Staff</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="bi bi-floppy-fill"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('admin/user/'.$item->id)}}" class="btn btn-success btn-sm"
                                    target="_blank" rel="noopener noreferrer"><i class="bi bi-person-square"></i></a>
                                <form action="{{url('admin/user/'.$item->id)}}" method="post" id="hapus-users">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="button" onclick="ClickUsers()"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function ClickUsers() {
      Swal.fire({
          title: 'Konfirmasi',
          text: 'Apakah Anda yakin ingin menghapus ini?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batal'
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('hapus-users').submit();
          }
      });
      
  }
</script>
@endsection