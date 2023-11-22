import axios from "axios";
import reportsEndpoints from "./endpoint";
import services from "../../../../common-services/services";
import customAlerts from "../../../../common-services/alerts";

const {
  reports,
} = reportsEndpoints();

const {
  getDatatablesHeaders,
} = services();

const reportsApi = () => {
  const _reports = (data) => {
    return {
      url: reports,
      type: 'POST',
      dataType: 'json',
      data: data,
      headers: getDatatablesHeaders()
    }
  }

  return {
    _reports,
  }
}

export default reportsApi;
