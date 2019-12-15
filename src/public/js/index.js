window.addEventListener('load', function () {

  let carte = null;


  $('#create-customer').on('submit', function (e) {
    e.preventDefault();
    const formData = {
      prenom: $('input[name="prenom"]').val(),
      nom: $('input[name="nom"]').val(),
      email: $('input[name="email"]').val(),
      budget: $('input[name="budget"]:checked').val(),
      niveau: $('input[name="niveau"]:checked').val(),
      saison: $('input[name="saison"]:checked').val(),
    }

    $.ajax({
      method: 'POST',
      dataType: 'json',
      url: '/api/customers',
      data: formData
    }).then((res) => {
      $('#subscribeCustomer').modal('hide')
      $.getJSON('/api/destinations/' + formData['budget'] + '/' + formData['niveau'] + '/' + formData['saison'],
        (markers) => {
          if(carte){
            carte.markers = markers;
            carte.initMarkers();
          } else {
            carte = new Carte(markers);
          }
        })
    }, (err) => {
      console.log(err)
    })
  })

  /* A la validation du formulaire d'inscription
  Pour plus tard
   */
  /*$.post('/api/subscribe-customer', formData).then((resp) => {
    return $.getJSON('/api/get-destinations')
  }).then((markers) => {
  //CARTE
  const carte = new Carte(markers);
})*/

});





