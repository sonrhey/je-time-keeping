import axios from "axios";
import timeInEndpoints from "./endpoint";
import services from "../../../../common-services/services";
import customAlerts from "../../../../common-services/alerts";

const {
  timeIn,
  checkTimeIn,
} = timeInEndpoints();

const {
  getHeaders,
} = services();

const {
  toastAlert,
} = customAlerts();

const timeInApi = () => {
  const _timeIn = async () => {
    try {
      const request = await axios.post(timeIn, [], getHeaders());
      const response = await request.data;
      const timeInResponse = response.data;
      toastAlert(timeInResponse, response.success);
      return true;
    } catch (error) {
      return false;
    }
  }

  const _checkTimeIn = async () => {
    const request = await axios.post(checkTimeIn, [], getHeaders());
    const response = await request.data;
    const isTimeIn = response.data;
    return isTimeIn;
  }

  return {
    _timeIn,
    _checkTimeIn,
  }
}

export default timeInApi;
