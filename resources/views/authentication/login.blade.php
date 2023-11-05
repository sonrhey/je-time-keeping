@extends('authentication.layout')
@section('content')
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Login</h5>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="d-grid mt-2">
      <button type="button" class="btn btn-primary p-3">Login</button>
    </div>
  </div>
</div>
@endsection
