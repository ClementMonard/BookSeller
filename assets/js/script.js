$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    $('select').material_select();
    $('#resume').val('');
    $('#resume').trigger('autoresize');
    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 150, // Creates a dropdown of 15 years to control year,
      today: 'Today',
      clear: 'Clear',
      close: 'Ok',
      closeOnSelect: false // Close upon selecting a date,
    });
    
  });

  $('#deleteAccount').click(function(e) {
    e.preventDefault();
    $.post (
      '../ajax/userDelete.php',
      {
        deleteinput: $('#deleteInput').val()
      },
      function(data) {
        if (data == 'SUCCESSFULL') {
          location.reload();
        } else {
          alert('Erreur');
        }
      }, 'text'
    );
  });