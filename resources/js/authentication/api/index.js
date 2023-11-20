import axios from "axios";
import authenticationEndpoint from "./endpoint";
import apiToken from "../../constants/api-token";

const {
  login,
} = authenticationEndpoint();

const {
  getToken,
} = apiToken();

const authenticationApi = () => {
  const _login = async (data) => {
    const request = await axios.post(login, data);
    const response = await request.data;
    return response;
  }

  return {
    _login
  }
}

export default authenticationApi;
