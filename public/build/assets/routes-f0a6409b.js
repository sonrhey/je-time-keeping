const c=()=>({setFirstName:t=>{localStorage.setItem("firstName",t)},setLastName:t=>{localStorage.setItem("lastName",t)},setRole:t=>{localStorage.setItem("role",t)},getFirstName:()=>localStorage.getItem("firstName"),getLastName:()=>localStorage.getItem("lastName"),getRole:()=>localStorage.getItem("role")}),m=()=>({adminRoutes:()=>({ADMIN_DASHBOARD:"/admin/dashboard",ADMIN_BASE:"/admin"}),teacherRoutes:()=>({TEACHER_TIME_IN:"/time-in",TEACHER_BASE:"/"})});export{c,m as r};