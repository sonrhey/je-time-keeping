import apiBase from "../../../../constants/api-base";

const {
  API_URL,
} = apiBase();

const dashboardEndpoint = () => {
  const teachersLoggedInToday = `${API_URL}/admin/teachers-logged-in`;

  return {
    teachersLoggedInToday,
  }
}

export default dashboardEndpoint;
