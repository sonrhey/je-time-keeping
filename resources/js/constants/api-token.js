const apiToken = () => {
  const saveToken = (token) => {
    localStorage.setItem('token', token);
  };

  const getToken = () => {
    const token = localStorage.getItem('token');
    return token;
  };

  return {
    saveToken,
    getToken,
  }
}

export default apiToken;
