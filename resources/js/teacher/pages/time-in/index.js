import currentLogin from "../../../constants/details";
import time from "../../../common-services/time";
import timeInApi from "./api";
import apiToken from "../../../constants/api-token";
import roles from "../../../constants/roles";
import routes from "../../../routes";

const {
  getToken,
} = apiToken();

const {
  TEACHER,
} = roles();

const {
  run
} = time();

const {
  getFirstName,
  getRole,
} = currentLogin();

const {
  _timeIn,
  _checkTimeIn,
} = timeInApi();

const {
  teacherRoutes,
} = routes();

const {
  TEACHER_BASE,
} = teacherRoutes();

run();

const loadPageData = () => {
  let $omName = $('.teacher-name'),
  $timeIn = $('#time-in');
  $omName.html(getFirstName);

  const checkTimeIn = async () => {
    const response = await _checkTimeIn();
    const isTimeIn = response.time_in;
    if (isTimeIn) return $timeIn.removeClass('btn-warning').addClass('btn-success').html('Already time in.');

    $timeIn.on('click', async function() {
      const timeIn = await _timeIn();
      location.reload();
    });
  }

  checkTimeIn();
}


const checkIsAuthValid = () => {
  const checkTokenIsValid = () => {
    const loginToken = getToken();
    const role = getRole();
    const tokenNull = loginToken === null;
    if (tokenNull || role !== TEACHER) return location.replace(TEACHER_BASE);
    loadPageData();
  }
  checkTokenIsValid();
}

checkIsAuthValid();
