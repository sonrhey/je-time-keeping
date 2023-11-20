import roles from "../../../constants/roles";
import usersApi from "./api";
import managerPopulator from "./populators/manager-populator";
import shiftPopulator from "./populators/shifts-populator";

const {
  TEACHER,
  MANAGER,
} = roles();

const {
  _getManagers,
  _getShifts,
  _registerUser,
  _getMyTeachers,
} = usersApi();

let $roles = $('#roles'),
    $managers = $('#managers'),
    $shifts = $('#shifts'),
    $teacherRoleOnly = $('#teacher-role-only'),
    $userSubmit = $('#userSubmit');

$roles.on('change', function() {
  const selectedValue = $(this).val();
  selectedValue === TEACHER ? $teacherRoleOnly.removeClass('d-none') : $teacherRoleOnly.addClass('d-none');
});

const preLoadDatas = async () => {
  const managers = await _getManagers();
  const shifts = await _getShifts();
  managerPopulator(managers, $managers);
  shiftPopulator(shifts, $shifts);
}

preLoadDatas();

$userSubmit.on('submit', function(e) {
  e.preventDefault();
  const formFields = $(this).serializeArray();
  const data = Object.fromEntries(formFields.map(entry => [entry.name, entry.value]));
  _registerUser(data);
});

let usersList = new DataTable('#users-list', {
  responsive: true,
  ajax: _getMyTeachers,
  columns: [
    {
      data: 'team',
    },
    {
      data: 'teacher',
    },
    {
      data: 'email',
    },
    {
      data: 'mobile_number',
    }
  ],
  columnDefs: [
    {
      targets: 4,
      data: null,
      render: function (data, type, row) {
        return '<button class="btn btn-danger" type="button"><span class="fa fa-edit"></span></button>';
      },
    }
  ],
});
