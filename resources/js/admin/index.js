import time from "../common-services/time";
import currentLogin from "../constants/details";
import routes from "../routes";
import apiToken from "../constants/api-token";
import roles from "../constants/roles";

const {
  getToken,
} = apiToken();

const {
  MANAGER,
} = roles();

const {
  getFirstName,
  getRole,
} = currentLogin();

const {
  adminRoutes,
} = routes();

const {
  ADMIN_BASE,
} = adminRoutes();

const {
  run
} = time();

run();

const loadPageData = () => {
  let $omName = $('.om-name'),
  $logout = $('#logout');
  $omName.html(getFirstName);

  $logout.on('click', function(){
  localStorage.clear();
  location.replace(ADMIN_BASE);
  });
}

const checkIsAuthValid = () => {
  const checkTokenIsValid = () => {
    const loginToken = getToken();
    const role = getRole();
    const tokenNull = loginToken === null;
    if (tokenNull || role !== MANAGER) return location.replace(ADMIN_BASE);
    loadPageData();
  }
  checkTokenIsValid();
}

checkIsAuthValid();
