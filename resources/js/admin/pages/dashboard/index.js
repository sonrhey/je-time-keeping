import dashboardApi from "./api";
import moment from "moment";

const {
  _getTeachersLoggedIn,
} = dashboardApi();


let teacherList = new DataTable('#teacher-list', {
  responsive: true,
  ajax: _getTeachersLoggedIn,
  columns: [
    {
      data: 'teacher'
    },
    {
      data: 'team'
    },
    {
      data: 'status',
      render: function (data, type, row) {
        const noTimeIn = `<span class="badge bg-danger">No time in yet</span>`;
        const timeIn = `<span class="badge bg-success">Time In</span>`;
        const status = row.status ? timeIn : noTimeIn;
        return status;
      }
    },
    {
      data: 'time_in',
      render: function (data, type, row) {
        const timeLoggedInUnavailable = `<span class="badge bg-danger">N/A</span>`;

        return row.time_in ? moment.utc(row?.time_in).local().format('MMMM D, YYYY h:mm:ss A') : timeLoggedInUnavailable;
      }
    }
  ]
});
