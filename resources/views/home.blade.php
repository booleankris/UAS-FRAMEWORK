@extends('template')
@section('content')
<style>
  .btn{
    margin:0 6px 0px 12px;
  }
</style>
<div class="row p-0 m-0">
<div class="col-lg-12 col-md-12">
  <br><br>
  <h5>Category Data </h5>
  <br>
  <a href="{{ url('create') }}">
  <button type="button" class="btn mb-2 mb-md-0 btn-quarternary btn-block"><span>Tambah Data</span> 
    <div class="icon d-flex align-items-center justify-content-center">
      <i class="ion-ios-cloud-download"></i>
    </div>
  </button>
</a>
  <table id="category-table" class="display" style="width:95%">
    <thead class="bordered">
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Slug</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $category)
      <tr>
        <td><img src="img/uploads/{{ $category->image }}" width="100px"></td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->slug }}</td>
        <td><div class="d-flex">
          <a href="{{ url('edit/'.$category->id) }}"><button class="btn bg-warning color-light">Edit</button></a>
          <button onclick="Delete({{ $category->id }})" class="btn bg-danger color-lig">Delete</button></div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection