const buttonsDeleteCustomer = document.querySelectorAll(".delete-customer");
Array.from(buttonsDeleteCustomer).forEach(function (button) {
  button.addEventListener('click', (e) => {
    const customerId = e.target.dataset['customerId'];
    $.ajax({
      method: 'DELETE',
      url: '/api/customers/' + customerId
    }).then((res) => {
      document.location.reload(true);
    })
  })
})
