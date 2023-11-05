$(() => {

let $currentTime = $('.current-time');

const updateClock = () => {
  const now = new Date();
  const hours = now.getHours() % 12 || 12;
  const minutes = now.getMinutes();
  const seconds = now.getSeconds();
  const ampm = now.getHours() >= 12 ? 'PM' : 'AM';

  const formattedTime = `${hours}:${padZero(minutes)}:${padZero(seconds)} ${ampm}`;
  $currentTime.text(formattedTime);
}

const padZero = (number) => {
  return (number < 10 ? '0' : '') + number;
}

updateClock();
setInterval(updateClock, 1000);
});
