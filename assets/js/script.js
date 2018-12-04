$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    $('.carousel').carousel();
    $('select').material_select();
    $('#resume').val('');
    $('#resume').trigger('autoresize');
    $('.collapsible').collapsible();
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

  $('#autocomplete-input-type').autocomplete({
    data: {
      "Psychologie": null,
      "Business": null,
      "Roman Science-fiction": null,
      "Développement Personnel": null
    },
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      $.ajax({
        type: 'POST',
        url: '../ajax/application.php',
        data: {
            inputApp: val
        },
        timeout: 3000,
        dataType: 'json',
        success: function (data) {
          $('#displayBooks').html('');
          $.each(data, function (id, output)
                    {
                       $('#displayBooks').append('<a href="bookdetails.php?id='+ output['id'] + '"><img class="bookscovertob" src="assets/img/bookscover/' + output['cover'] + '"/></a>');
                    });
        }
    });
    },
    minLength: 1,
  });


  $('#autocomplete-input-book').on('input', function () {
    $.ajax({
        type: 'POST',
        url: '../ajax/application.php',
        data: {
            bookName: $(this).val()
        },
        timeout: 1000,
        dataType: 'json',
        success: function (data) {
            let book = {};
                for (var i = 0; i < data.length; i++) {
                    book[data[i].name] = '../assets/img/bookscover/' + data[i].cover;
                }
            $('#autocomplete-input-book').autocomplete({
                data: book, 
                limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
                onAutocomplete: function(val) {
                  $.ajax({
                    type: 'POST',
                    url: '../ajax/application.php',
                    data: {
                        inputAppBook: val
                    },
                    timeout: 3000,
                    dataType: 'json',
                    success: function (data) {
                      $('#displayBooks').html('');
                      $.each(data, function (id, output)
                                {
                                   $('#displayBooks').append('<a href="bookdetails.php?id='+ output['id'] + '"><img class="bookscovertob" src="assets/img/bookscover/' + output['cover'] + '"/></a>');
                                });
                    }
                });      // Callback function when value is autcompleted.
                },
                minLength: 1,
            });
        }
    });
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