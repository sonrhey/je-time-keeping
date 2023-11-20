import apiBase from "../../../../constants/api-base";

const {
  API_URL
} = apiBase();

const usersEndpoints = () => {
  const getManagers = `${API_URL}/admin/managers`;
  const getShifts = `${API_URL}/admin/shifts`;
  const registerUser = `${API_URL}/register`;
  const getMyTeachers = `${API_URL}/admin/my-teachers`;

  return {
    getManagers,
    getShifts,
    registerUser,
    getMyTeachers,
  }
}

export default usersEndpoints;
