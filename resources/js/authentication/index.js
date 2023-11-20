import roles from "../constants/roles";
import loginRequest from "./request/login";
import authenticationApi from "./api";
import apiToken from "../constants/api-token";
import currentLogin from "../constants/details";
import customAlerts from "../common-services/alerts";
import routes from "../routes";

const {
  MANAGER,
  TEACHER,
}  = roles();

const {
  credentials,
} = loginRequest();

const {
  getToken,
  saveToken,
} = apiToken();

const {
  setFirstName,
  setLastName,
  setRole,
  getRole,
} = currentLogin();

const {
  _login,
} = authenticationApi();

const {
  defaultAlert,
  toastAlert,
} = customAlerts();

const {
  adminRoutes,
  teacherRoutes,
} = routes();

const {
  ADMIN_DASHBOARD,
} = adminRoutes();

const {
  TEACHER_TIME_IN,
} = teacherRoutes();

const authenticate = (currentRole) => {
  let $email = $('#email'),
      $password = $('#password'),
      $formSubmit = $('#form-submit');

  const loadPages = (appRole) => {
    switch (appRole) {
      case MANAGER:
        location.replace(ADMIN_DASHBOARD)
        break;
      case TEACHER:
        location.replace(TEACHER_TIME_IN)
        break;
    }
  }

  const checkTokenIsValid = () => {
    const loginToken = getToken();
    const role = getRole();
    const tokenUndefined = loginToken === undefined;
    const tokenNull = loginToken === null;
    if (!tokenUndefined && !tokenNull && role === currentRole) return loadPages(currentRole);
  }

  checkTokenIsValid();

  $formSubmit.on('submit', async function(e) {
    e.preventDefault();
    credentials.type = currentRole;
    credentials.email = $email.val();
    credentials.password = $password.val();
    const loginResponse = await _login(credentials);
    if (!loginResponse.success) return toastAlert(loginResponse.data.error_messages);
    const responseData = loginResponse.data;
    const role = loginResponse.data.role;
    const firstName = role.name === TEACHER ? responseData.teacher.first_name : responseData.manager.first_name;
    const lastName = role.name === TEACHER ? responseData.teacher.last_name : responseData.manager.last_name;
    saveToken(loginResponse.data.token);
    setFirstName(firstName);
    setLastName(lastName);
    setRole(role.name);
    loadPages(currentRole);
  });

  $email.on('keyup', function() {
    keyUpTriggers($(this));
  });

  $password.on('keyup', function() {
    keyUpTriggers($(this));
  });

  const keyUpTriggers = ($element) => {
    $element.parent().removeClass('has-danger');
    $element.closest('div').find('.invalid-feedback').remove();
    $element.removeClass('is-invalid');
  }
}

export default authenticate;
