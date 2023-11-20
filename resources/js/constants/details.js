const currentLogin = () => {
  const setFirstName = (firstName) => {
    localStorage.setItem('firstName', firstName);
  }

  const setLastName = (lastName) => {
    localStorage.setItem('lastName', lastName);
  }

  const setRole = (role) => {
    localStorage.setItem('role', role);
  }

  const getFirstName = () => {
    return localStorage.getItem('firstName');
  }

  const getLastName = () => {
    return localStorage.getItem('lastName');
  }

  const getRole = () => {
    return localStorage.getItem('role');
  }

  return {
    setFirstName,
    setLastName,
    setRole,
    getFirstName,
    getLastName,
    getRole,
  }
}

export default currentLogin;
