@extends('admin.layout')
@section('content')
<div class="dashboard-container">
  <div class="d-flex align-items-center justify-content-between">
    <label class="label h2">Teachers Login Today</label>
  </div>
  <div class="mt-4"></div>
  <div class="mb-4"></div>
  <div class="buttons-here"></div>
  <div class="table-responsive">
    <table id="teacher-list" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th scope="col">Teacher</th>
          <th scope="col">Team</th>
          <th scope="col">Status</th>
          <th scope="col">Time In</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection
@section('custom-script')
@vite('resources/js/admin/pages/dashboard/index.js');
@endsection
