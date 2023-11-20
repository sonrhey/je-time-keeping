const routes = () => {
  const adminRoutes = () => {
    const ADMIN_DASHBOARD = '/admin/dashboard';
    const ADMIN_BASE = '/admin';

    return {
      ADMIN_DASHBOARD,
      ADMIN_BASE,
    }
  }

  const teacherRoutes = () => {
    const TEACHER_TIME_IN = '/time-in';
    const TEACHER_BASE = '/';

    return {
      TEACHER_TIME_IN,
      TEACHER_BASE,
    }
  }

  return {
    adminRoutes,
    teacherRoutes,
  }
}

export default routes;
