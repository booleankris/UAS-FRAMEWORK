@extends('template')
@section('content')
<br><br>
<div class="col-lg-10"><br>
    <div class="card">
      <div class="card-header bg-white pb-1">
        <h5>Tambah Kategori</h5>
      </div>
      <div class="card-body">
          <form action="{{ url('insert') }}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Kategori</label>
                <div class="col-sm-9">
                  <input type="text" required name="name" class="form-control" placeholder="Nama Kategori">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-9">
                  <input type="file" required name="image" class="dropify" placeholder="Nama Kategori">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                </div>
              </div>
            </form>
      </div>
    </div>
</div>
@endsection