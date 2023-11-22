import reportsApi from "./api";
import moment from "moment";

const {
  _reports,
} = reportsApi();

const request = {
  type: 'daily',
}

let $daily = $('#daily'),
    $weekly = $('#weekly'),
    $monthly = $('#monthly');

const reportList = () => {
  const reportDT = $('#report-list').DataTable({
    ajax: _reports(request),
    destroy: true,
    dom: 'Bfrtip',
    buttons: [
      'excel'
    ],
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
        data: 'date_time_in',
        render: function (data, type, row) {
          const timeLoggedInUnavailable = `<span class="badge bg-danger">N/A</span>`;
          return row.date_time_in ? moment.utc(row?.date_time_in).local().format('MMMM D, YYYY h:mm:ss A') : timeLoggedInUnavailable;
        }
      },
      {
        data: 'date',
        render: function (data, type, row) {
          return moment.utc(row.date).local().format('MMMM D, YYYY');
        }
      }
    ],
  });

  return reportDT;
}

reportList();

$daily.on('click', function() {
  request.type = 'daily';
  reportList().ajax.reload();
});

$weekly.on('click', function() {
  request.type = 'weekly';
  reportList().ajax.reload();
});

$monthly.on('click', function() {
  request.type = 'monthly';
  reportList().ajax.reload();
});
