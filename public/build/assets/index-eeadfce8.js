import{a as o}from"./api-base-25da54c4.js";import{s as r}from"./services-f2e5a5e5.js";import{h as d}from"./moment-fbc5633a.js";import"./api-token-faa9c944.js";const{API_URL:c}=o(),g=()=>({teachersLoggedInToday:`${c}/admin/teachers-logged-in`}),{getHeaders:y,getDatatablesHeaders:i}=r(),{teachersLoggedInToday:m}=g(),p=()=>({_getTeachersLoggedIn:{url:m,type:"POST",dataType:"json",headers:i()}}),{_getTeachersLoggedIn:h}=p();new DataTable("#teacher-list",{responsive:!0,ajax:h,columns:[{data:"teacher"},{data:"team"},{data:"status",render:function(a,s,e){const t='<span class="badge bg-danger">No time in yet</span>',n='<span class="badge bg-success">Time In</span>';return e.status?n:t}},{data:"time_in",render:function(a,s,e){const t='<span class="badge bg-danger">N/A</span>';return e.time_in?d.utc(e==null?void 0:e.time_in).local().format("MMMM D, YYYY h:mm:ss A"):t}}]});
