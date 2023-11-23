import{r as l}from"./roles-57959868.js";import{a as i}from"./axios-82afda87.js";import{a as g}from"./api-base-25da54c4.js";import{s as f}from"./services-f2e5a5e5.js";import{c as h}from"./alerts-9c687a37.js";import"./api-token-faa9c944.js";import"./index-559f946c.js";import"./_commonjsHelpers-725317a4.js";const{API_URL:r}=g(),y=()=>{const t=`${r}/admin/managers`,s=`${r}/admin/shifts`,e=`${r}/register`,a=`${r}/admin/my-teachers`;return{getManagers:t,getShifts:s,registerUser:e,getMyTeachers:a}},{getManagers:b,getShifts:_,registerUser:v,getMyTeachers:w}=y(),{getHeaders:u,getDatatablesHeaders:M}=f(),{toastAlert:d}=h(),A=()=>{const t=async()=>(await(await i.get(b,u())).data).data,s=async()=>(await(await i.get(_,u())).data).data,e=async n=>{const o=await(await i.post(v,n)).data,p=o.data;return o.success?d(p,o.success):d(o.data.error_messages),p},a={url:w,type:"GET",dataType:"json",headers:M()};return{_getManagers:t,_getShifts:s,_registerUser:e,_getMyTeachers:a}},E=(t=[],s)=>{s.empty(),s.append(`
    <option value="">Choose One</option>
  `),t.forEach(e=>{s.append(`
      <option value="${e.id}">${e.first_name} ${e.last_name}</option>
    `)})},T=(t=[],s)=>{s.empty(),s.append(`
    <option value="">Choose One</option>
  `),t.forEach(e=>{s.append(`
      <option value="${e.id}">${e.name}</option>
    `)})},{TEACHER:q,MANAGER:N}=l(),{_getManagers:S,_getShifts:C,_registerUser:D,_getMyTeachers:U}=A();let O=$("#roles"),R=$("#managers"),j=$("#shifts"),m=$("#teacher-role-only"),H=$("#userSubmit");O.on("change",function(){$(this).val()===q?m.removeClass("d-none"):m.addClass("d-none")});const P=async()=>{const t=await S(),s=await C();E(t,R),T(s,j)};P();H.on("submit",function(t){t.preventDefault();const s=$(this).serializeArray(),e=Object.fromEntries(s.map(a=>[a.name,a.value]));D(e)});new DataTable("#users-list",{responsive:!0,ajax:U,columns:[{data:"team"},{data:"teacher"},{data:"email"},{data:"mobile_number"}],columnDefs:[{targets:4,data:null,render:function(t,s,e){return'<button class="btn btn-danger" type="button"><span class="fa fa-edit"></span></button>'}}]});
