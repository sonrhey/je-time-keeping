import axios from "axios";
import usersEndpoints from "./endpoints";
import services from "../../../../common-services/services";
import customAlerts from "../../../../common-services/alerts";

const {
  getManagers,
  getShifts,
  registerUser,
  getMyTeachers,
} = usersEndpoints();

const {
  getHeaders,
  getDatatablesHeaders,
} = services();

const {
  toastAlert,
} = customAlerts();

const usersApi = () => {
  const _getManagers = async () => {
    const request = await axios.get(getManagers, getHeaders());
    const response = await request.data;
    const managers = response.data;
    return managers;
  }

  const _getShifts = async () => {
    const request = await axios.get(getShifts, getHeaders());
    const response = await request.data;
    const shifts = response.data;
    return shifts;
  }

  const _registerUser = async (data) => {
    const request = await axios.post(registerUser, data);
    const response = await request.data;
    const user = response.data;
    (response.success) ? toastAlert(user, response.success) : toastAlert(response.data.error_messages);
    return user;
  }

  const _getMyTeachers = {
    url: getMyTeachers,
    type: 'GET',
    dataType: 'json',
    headers: getDatatablesHeaders()
  }

  return {
    _getManagers,
    _getShifts,
    _registerUser,
    _getMyTeachers,
  }
}

export default usersApi;
