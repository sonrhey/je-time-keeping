const managerPopulator = (managers = [], $element) => {
  $element.empty();
  $element.append(`
    <option value="">Choose One</option>
  `);
  managers.forEach(manager => {
    $element.append(`
      <option value="${manager.id}">${manager.first_name} ${manager.last_name}</option>
    `);
  })
}

export default managerPopulator;
