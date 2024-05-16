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
        <h5><b>Table Lecture</b></h5>
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
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">NIP</label>
                                <input type="text" class="form-control" id="validationCustom03" name="nip" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Name</label>
                                <input type="text" class="form-control" id="validationCustom03" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Front Degree</label>
                                <input type="text" class="form-control" id="validationCustom03" name="front_degree">
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Back Degree</label>
                                <input type="text" class="form-control" id="validationCustom03" name="back_degree"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Place Of Birth</label>
                                <input type="text" class="form-control" id="validationCustom03" name="place_of_birth"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Date Of Birth</label>
                                <input type="date" class="form-control" id="validationCustom03" name="date_of_birth"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Gender</label>
                                <select class="form-select" aria-label="Default select example" name="gender" required>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Number Handphone</label>
                                <input type="number" class="form-control" id="validationCustom03"
                                    name="number_handphone" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Address</label>
                                <input type="text" class="form-control" id="validationCustom03" name="address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">RT</label>
                                <input type="number" class="form-control" id="validationCustom03" name="rt" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">RW</label>
                                <input type="number" class="form-control" id="validationCustom03" name="rw" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Village</label>
                                <input type="text" class="form-control" id="validationCustom03" name="village" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Sub District</label>
                                <input type="text" class="form-control" id="validationCustom03" name="subdistrict"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">City</label>
                                <input type="text" class="form-control" id="validationCustom03" name="city" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Province</label>
                                <input type="text" class="form-control" id="validationCustom03" name="province"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Postal Code</label>
                                <input type="number" class="form-control" id="validationCustom03" name="postal_code"
                                    required>
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
                        <th scope="col">NIP</th>
                        <th scope="col">Name</th>
                        <th scope="col">HP</th>
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
                        <td>{{$item->nip}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->number_handphone}}</td>
                        <td>
                            <div class="d-flex">
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalLec{{$item->id}}">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalLec{{$item->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Store Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{url('admin/lecture/'.$item->id)}}"
                                                    class="row g-3 needs-validation" novalidate method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">NIP</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            name="nip" value="{{$item->nip}}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            name="name" value="{{$item->name}}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">Front
                                                            Degree</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            name="front_degree" value="{{$item->front_degree}}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">Back
                                                            Degree</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            name="back_degree" value="{{$item->back_degree}}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">Place Of
                                                            Birth</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            name="place_of_birth" value="{{$item->place_of_birth}}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">Date Of
                                                            Birth</label>
                                                        <input type="date" class="form-control" id="validationCustom03"
                                                            name="date_of_birth" value="{{$item->date_of_birth}}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03"
                                                            class="form-label">Gender</label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="gender" required>
                                                            <option value="{{$item->gender}}">{{$item->gender}}</option>
                                                            <option value="male">male</option>
                                                            <option value="female">female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">Number
                                                            Handphone</label>
                                                        <input type="number" class="form-control"
                                                            id="validationCustom03" name="number_handphone"
                                                            value="{{$item->number_handphone}}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03"
                                                            class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            name="address" value="{{$item->address}}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">RT</label>
                                                        <input type="number" class="form-control"
                                                            id="validationCustom03" name="rt" value="{{$item->rt}}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">RW</label>
                                                        <input type="number" class="form-control"
                                                            id="validationCustom03" name="rw" value="{{$item->rw}}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03"
                                                            class="form-label">Village</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            name="village" value="{{$item->village}}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">Sub
                                                            District</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            name="subdistrict" value="{{$item->subdistrict}}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">City</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            name="city" value="{{$item->city}}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03"
                                                            class="form-label">Province</label>
                                                        <input type="text" class="form-control" id="validationCustom03"
                                                            name="province" value="{{$item->province}}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationCustom03" class="form-label">Postal
                                                            Code</label>
                                                        <input type="number" class="form-control"
                                                            id="validationCustom03" name="postal_code"
                                                            value="{{$item->postal_code}}" required>
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
                                <form action="{{url('admin/user/'.$item->id)}}" method="post" id="hapus-lecture">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="button" onclick="clickLecture()"><i
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
    function clickLecture() {
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
              document.getElementById('hapus-lecture').submit();
          }
      });
      
  }
</script>
@endsection