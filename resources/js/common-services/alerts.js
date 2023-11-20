import Swal from "sweetalert2";
import '../../css/sweet-alert/index.css';
import systemMessages from "../constants/messages";

const {
  GENERIC_MESSAGE,
} = systemMessages();

const customAlerts = () => {
  const defaultAlert = () => {
    Swal.fire({
      title: 'Error!',
      text: 'Do you want to continue',
      icon: 'error',
      confirmButtonText: 'Cool'
    });
  }

  const toastAlert = (message, status = false) => {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-right',
      iconColor: 'white',
      customClass: {
        popup: 'colored-toast',
      },
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true,
    })

    ;(async () => {
      await Toast.fire({
        icon: status ? 'success' : 'error',
        title: manipulateMessage(message),
      })
    })()
  }

  const manipulateMessage = (messages) => {
    $(`.invalid-feedback`).remove();
    $('input').removeClass('is-invalid');
    $('div').removeClass('has-danger');
    if (!isObject(messages)) return messages;
    for (const key in messages) {
      console.log(key)
      let $errorElement = $(`#${key}`);
      $errorElement.parent().addClass('has-danger');
      $errorElement.addClass('is-invalid');
      $(`.${key}-feedback`).remove();
      $errorElement.after(`
      <div class="${key}-feedback invalid-feedback">${messages[key][0]}</div>
      `);
    }

    return GENERIC_MESSAGE;
  }

  const isObject = obj => {
    return typeof obj === 'object' && obj !== null && !Array.isArray(obj)
  }

  return {
    defaultAlert,
    toastAlert,
  }
}

export default customAlerts;
