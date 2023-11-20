import apiBase from "../../../../constants/api-base";

const {
  API_URL,
} = apiBase();

const timeInEndpoints = () => {
  const timeIn = `${API_URL}/teacher/time-in`;
  const checkTimeIn = `${API_URL}/teacher/check-time-in`;

  return {
    timeIn,
    checkTimeIn,
  }
}

export default timeInEndpoints;
