@extends('admin.layout')
@section('content')
<div class="dashboard-container">
  <div class="d-flex align-items-center justify-content-between">
    <label class="label h2">Attendance Reports</label>
  </div>
  <div class="mt-4"></div>
  <div class="d-flex gap-2 justify-content-end">
    <span class="badge bg-primary p-3" id="daily" role="button">Daily</span>
    <span class="badge bg-success p-3" id="weekly" role="button">Weekly</span>
    <span class="badge bg-warning p-3" id="monthly" role="button">Monthly</span>
    <span class="badge bg-info p-3" id="custom" role="button">Custom</span>
  </div>
  <div class="mb-4"></div>
  <div class="table-responsive">
    <table class="table table-striped" id="report-list">
      <thead>
        <tr>
          <th scope="col">Teacher</th>
          <th scope="col">Team</th>
          <th scope="col">Status</th>
          <th scope="col">Date Time In</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection
@section('custom-script')
@vite('resources/js/admin/pages/reports/index.js');
@endsection
