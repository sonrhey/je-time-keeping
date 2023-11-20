@extends('authentication.layout')
@section('content')
<div class="teacher-login-container d-table w-100 h-100">
  <div class="teacher-login-container-1 d-table-cell align-middle">
    <div class="card  w-md-100 w-25em m-auto">
      <div class="card-body">
        <form id="form-submit">
          <h5 class="card-title">Teachers Login</h5>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" placeholder="name@example.com" name="email" id="email">
            <label for="email">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
            <label for="password">Password</label>
          </div>
          <div class="d-grid mt-2">
            <button type="submit" class="btn btn-primary p-3">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('custom-js')
@vite([
  'resources/js/teacher/pages/login/index.js'
])
@endsection
