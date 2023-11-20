@extends('admin.layout')
@section('custom-css')
@endsection
@section('content')
<div class="dashboard-container">
  <div class="d-flex align-items-center justify-content-between">
    <label class="label h2">Teachers</label>
  </div>
  <div class="mt-4"></div>
  <div>
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Teacher</button>
  </div>
  <div class="mb-4"></div>
  <div class="table-responsive">
    <table class="table table-striped" id="users-list">
      <thead>
        <tr>
          <th scope="col">Team</th>
          <th scope="col">Teacher</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile Number</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@include('admin.pages.teachers.modal.users')
@endsection
@section('custom-script')
@vite([
  'resources/js/admin/pages/users/index.js'
])
@endsection
