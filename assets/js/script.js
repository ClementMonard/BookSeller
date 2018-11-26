$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    $('.carousel').carousel();
    $('select').material_select();
    $('#resume').val('');
    $('#resume').trigger('autoresize');
    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 150, // Creates a dropdown of 15 years to control year,
      today: 'Today',
      clear: 'Clear',
      close: 'Ok',
      closeOnSelect: false // Close upon selecting a date,
    });

  $('input.autocomplete').autocomplete({
    data: {
      "Psychologie": null,
      "Business": null,
      "Roman Science-fiction": 'https://placehold.it/250x250',
      "Développement Personnel": null
    },
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      // Callback function when value is autcompleted.
    },
    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
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