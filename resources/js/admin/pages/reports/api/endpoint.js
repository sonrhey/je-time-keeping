import apiBase from "../../../../constants/api-base";

const {
  API_URL
} = apiBase();

const reportsEndpoints = () => {
  const reports = `${API_URL}/admin/reports`;

  return {
    reports,
  }
}

export default reportsEndpoints;
