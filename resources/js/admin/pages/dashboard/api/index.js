import dashboardEndpoint from "./endpoint";
import services from "../../../../common-services/services";

const {
  getHeaders,
  getDatatablesHeaders,
} = services();

const {
  teachersLoggedInToday,
} = dashboardEndpoint();


const dashboardApi = () => {
  const _getTeachersLoggedIn = {
    url: teachersLoggedInToday,
    type: 'POST',
    dataType: 'json',
    headers: getDatatablesHeaders()
  };

  return {
    _getTeachersLoggedIn,
  }
}

export default dashboardApi;
