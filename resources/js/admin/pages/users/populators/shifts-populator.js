const shiftPopulator = (shifts = [], $element) => {
  $element.empty();
  $element.append(`
    <option value="">Choose One</option>
  `);
  shifts.forEach(shift => {
    $element.append(`
      <option value="${shift.id}">${shift.name}</option>
    `);
  });
}

export default shiftPopulator;
