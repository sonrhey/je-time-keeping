import apiToken from "../constants/api-token";

const {
  getToken,
} = apiToken();

const token = getToken();

const services = () => {
  const getHeaders = () => {
    const headers = {
      headers: {
        'Authorization': `Bearer ${token}`,
      }
    }
    return headers;
  };

  const getDatatablesHeaders = () => {
    const headers = {
      'Authorization': `Bearer ${token}`,
    }
    return headers;
  };

  const getParamsWithHeaders = (params) => {
    const headers = {
      headers: {
        'Authorization': `Bearer ${token}`,
      },
      params: params
    }
    return headers;
  }

  const getHeadersWithResponseType = () => {
    const headers = {
      headers: {
        'Authorization': `Bearer ${token}`,
      },
      responseType: 'blob'
    }
    return headers;
  }

  const getHeadersWithContentType = () => {
    const headers = {
      headers: {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'multipart/form-data',
      }
    }
    return headers;
  }

  return {
    getHeaders,
    getParamsWithHeaders,
    getDatatablesHeaders,
    getHeadersWithContentType,
    getHeadersWithResponseType,
  }
}

export default services;
