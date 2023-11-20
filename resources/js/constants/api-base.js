const apiBase = () => {
  const API_URL = import.meta.env.VITE_APP_URL;

  return {
    API_URL,
  }
}

export default apiBase;
