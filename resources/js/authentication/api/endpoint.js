import apiBase from "../../constants/api-base";

const {
  API_URL
} = apiBase();

const authenticationEndpoint = () => {
  const login = `${API_URL}/login`;

  return {
    login
  }
}

export default authenticationEndpoint;
