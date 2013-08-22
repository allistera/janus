$(function() {
    $("#q").keyup(function(){

        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val();
 
        // Loop through the comment list
        $("#itemsList li").each(function(){
 
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).hide();
                
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
            }
        });
 
    });


    $( "#catalog" ).accordion();
    $( "#catalog li" ).draggable({
      appendTo: "body",
      helper: "clone"
    });

    $( ".breakfast" ).droppable({ 
        drop: function(event, ui) { 
          $( this ).find( ".placeholder" ).remove();

          $(this).append( '<tr id="' + ui.draggable.attr('id') + '"><td> ' + ui.draggable.html() + ' </td><td>' + ui.draggable.attr('weight') + '</td><td class="breakfastCalories">' + ui.draggable.attr('calories') + '</td><td class="breakfastProtein">' + ui.draggable.attr('protein') + '</td><td class="breakfastCarbs">' + ui.draggable.attr('carbohydrates') + '</td><td class="breakfastFat">' + ui.draggable.attr('fat') + '</td></tr>');


            var cal = 0;
            // iterate through each td based on class and add the values
            $(".breakfastCalories").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    cal += parseFloat(value);
                }
            });
            cal = Math.round(cal*100)/100;
            $(".breakfastCaloriesTotal").html(cal);

            var pro = 0;
            // iterate through each td based on class and add the values
            $(".breakfastProtein").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    pro += parseFloat(value);
                }
            });
            pro = Math.round(pro*100)/100;
            $(".breakfastProteinTotal").html(pro);

            var car = 0;
            // iterate through each td based on class and add the values
            $(".breakfastCarbs").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    car += parseFloat(value);
                }
            });
            car = Math.round(car*100)/100;
            $(".breakfastCarbsTotal").html(car);

            var fat = 0;
            // iterate through each td based on class and add the values
            $(".breakfastFat").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    fat += parseFloat(value);
                }
            });
            fat = Math.round(fat*100)/100;
            $(".breakfastFatTotal").html(fat);

            // Calculate grand totals
            calculateGrandTotals();
        }
    });


    $( ".lunch" ).droppable({ 
        drop: function(event, ui) { 
          $( this ).find( ".placeholder" ).remove();

          $(this).append( '<tr id="' + ui.draggable.attr('id') + '"><td> ' + ui.draggable.html() + ' </td><td>' + ui.draggable.attr('weight') + '</td><td class="lunchCalories">' + ui.draggable.attr('calories') + '</td><td class="lunchProtein">' + ui.draggable.attr('protein') + '</td><td class="lunchCarbs">' + ui.draggable.attr('carbohydrates') + '</td><td class="lunchFat">' + ui.draggable.attr('fat') + '</td></tr>');


            var cal = 0;
            // iterate through each td based on class and add the values
            $(".lunchCalories").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    cal += parseFloat(value);
                }
            });
            cal = Math.round(cal*100)/100;
            $(".lunchCaloriesTotal").html(cal);

            var pro = 0;
            // iterate through each td based on class and add the values
            $(".lunchProtein").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    pro += parseFloat(value);
                }
            });
            pro = Math.round(pro*100)/100;
            $(".lunchProteinTotal").html(pro);

            var car = 0;
            // iterate through each td based on class and add the values
            $(".lunchCarbs").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    car += parseFloat(value);
                }
            });
            car = Math.round(car*100)/100;
            $(".lunchCarbsTotal").html(car);

            var fat = 0;
            // iterate through each td based on class and add the values
            $(".lunchFat").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    fat += parseFloat(value);
                }
            });
            fat = Math.round(fat*100)/100;
            $(".lunchFatTotal").html(fat);

            // Calculate grand totals
            calculateGrandTotals();
        }
    });

    $( ".dinner" ).droppable({ 
        drop: function(event, ui) { 
          $( this ).find( ".placeholder" ).remove();

          $(this).append( '<tr id="' + ui.draggable.attr('id') + '"><td> ' + ui.draggable.html() + ' </td><td>' + ui.draggable.attr('weight') + '</td><td class="dinnerCalories">' + ui.draggable.attr('calories') + '</td><td class="dinnerProtein">' + ui.draggable.attr('protein') + '</td><td class="dinnerCarbs">' + ui.draggable.attr('carbohydrates') + '</td><td class="dinnerFat">' + ui.draggable.attr('fat') + '</td></tr>');


            var cal = 0;
            // iterate through each td based on class and add the values
            $(".dinnerCalories").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    cal += parseFloat(value);
                }
            });
            cal = Math.round(cal*100)/100;
            $(".dinnerCaloriesTotal").html(cal);

            var pro = 0;
            // iterate through each td based on class and add the values
            $(".dinnerProtein").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    pro += parseFloat(value);
                }
            });
            pro = Math.round(pro*100)/100;
            $(".dinnerProteinTotal").html(pro);

            var car = 0;
            // iterate through each td based on class and add the values
            $(".dinnerCarbs").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    car += parseFloat(value);
                }
            });
            car = Math.round(car*100)/100;
            $(".dinnerCarbsTotal").html(car);

            var fat = 0;
            // iterate through each td based on class and add the values
            $(".dinnerFat").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    fat += parseFloat(value);
                }
            });
            fat = Math.round(fat*100)/100;
            $(".dinnerFatTotal").html(fat);

            // Calculate grand totals
            calculateGrandTotals();

        }
    });

function calculateGrandTotals(){
        var grandCal = 0;
      $(".dinnerCaloriesTotal, .lunchCaloriesTotal, .breakfastCaloriesTotal").each(function() {

          var value = $(this).text();
          // add only if the value is number
          if(!isNaN(value) && value.length != 0) {
              grandCal += parseFloat(value);
          }
      });
      grandCal = Math.round(grandCal*100)/100;
      $(".dailyCaloriesTotal").html(grandCal);
      $("#caloriesTotal").val(grandCal);

        var grandPro = 0;
      $(".dinnerProteinTotal, .lunchProteinTotal, .breakfastProteinTotal").each(function() {

          var value = $(this).text();
          // add only if the value is number
          if(!isNaN(value) && value.length != 0) {
              grandPro += parseFloat(value);
          }
      });
      grandPro = Math.round(grandPro*100)/100;
      $(".dailyProteinTotal").html(grandPro);
      $("#proteinTotal").val(grandPro);

          // Calculate grand totals
      var grandCarbs = 0;
      $(".dinnerCarbsTotal, .lunchCarbsTotal, .breakfastCarbsTotal").each(function() {

          var value = $(this).text();
          // add only if the value is number
          if(!isNaN(value) && value.length != 0) {
              grandCarbs += parseFloat(value);
          }
      });
      grandCarbs = Math.round(grandCarbs*100)/100;
      $(".dailyCarbsTotal").html(grandCarbs);
      $("#carbohydratesTotal").val(grandCarbs);

        // Calculate grand totals
      var grandFat = 0;
      $(".dinnerFatTotal, .lunchFatTotal, .breakfastFatTotal").each(function() {

          var value = $(this).text();
          // add only if the value is number
          if(!isNaN(value) && value.length != 0) {
              grandFat += parseFloat(value);
          }
      });
      grandFat = Math.round(grandFat*100)/100;
      $(".dailyFatTotal").html(grandFat);
      $("#fatTotal").val(grandFat);
}

$('#button').click(function(event){

  var breakfastTable = $('#breakfastTable tbody');
  breakfastTable.sortable();
  $('#breakfastForm').val(breakfastTable.sortable('serialize'));

  var lunchTable = $('#lunchTable tbody');
  lunchTable.sortable();
  $('#lunchForm').val(lunchTable.sortable('serialize'));

  var dinnerTable = $('#dinnerTable tbody');
  dinnerTable.sortable();
  $('#dinnerForm').val(dinnerTable.sortable('serialize'));

  return true;
});

  });