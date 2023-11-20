<div class="modal fade" id="exampleModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form id="userSubmit">
          <div class="form-group">
            <div class="form-floating mb-3">
              <select class="form-select" name="type" id="roles">
                <option value="">Choose One</option>
                <option value="Teacher">Teacher</option>
                <option value="Manager">Manager</option>
              </select>
              <label for="roles">Select Type</label>
            </div>
            <div class="teacher-only-wrapper d-none" id="teacher-role-only">
              <div class="form-floating mb-3">
                <select class="form-select" name="manager_id" id="managers">
                </select>
                <label for="managers">Select Manager</label>
              </div>
              <div class="form-floating mb-3">
                <select class="form-select" name="shift_id" id="shifts">
                </select>
                <label for="shifts">Select Shift</label>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="first_name" id="firstName" placeholder="" required>
              <label for="firstName">First Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="last_name" id="lastName" placeholder="" required>
              <label for="lastName">Last Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" name="mobile_number" id="mobileNumber" placeholder="">
              <label for="mobileNumber">Mobile Number</label>
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" id="email" placeholder="" required>
              <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="password" id="password" placeholder="" required>
              <label for="password">Password</label>
            </div>
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
