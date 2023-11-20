@extends('admin.layout')
@section('content')
<div class="dashboard-container">
  <div class="d-flex align-items-center justify-content-between">
    <label class="label h2">Attendance Reports</label>
  </div>
  <div class="mt-4"></div>
  <div class="d-flex gap-2 justify-content-end">
    <span class="badge bg-primary p-3" role="button">Daily</span>
    <span class="badge bg-success p-3" role="button">Weekly</span>
    <span class="badge bg-warning p-3" role="button">Monthly</span>
    <span class="badge bg-info p-3" role="button">Custom</span>
  </div>
  <div class="mb-4"></div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Teacher</th>
          <th scope="col">Team</th>
          <th scope="col">Status</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <tr class="w-100">
          <th scope="row">Mario Collins</th>
          <th scope="row">Mara</th>
          <td><span class="badge bg-danger">No time in</span></td>
          <td>Nov. 07, 2023</td>
        </tr>
        <tr class="w-100">
          <th scope="row">Mario Collins</th>
          <th scope="row">Mara</th>
          <td><span class="badge bg-success">Time in</span></td>
          <td>Nov. 08, 2023</td>
        </tr>
        <tr class="w-100">
          <th scope="row">John Smith</th>
          <th scope="row">Jane</th>
          <td><span class="badge bg-success">Time In</span></td>
          <td>Nov. 07, 2023</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
