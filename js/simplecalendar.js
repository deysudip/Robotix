$('a[href=#event-cal-modal]').bind('click', function(){
  calender();
});

function calender(){

    var mon = 'Mon';
    var tue = 'Tue';
    var wed = 'Wed';
    var thur = 'Thur';
    var fri = 'Fri';
    var sat = 'Sat';
    var sund = 'Sun';

    /**
     * Get current date
     */
    var d = new Date();
    var strDate = yearNumber + "/" + (d.getMonth() + 1) + "/" + d.getDate();
    var yearNumber = (new Date).getFullYear();

    /**
     * Get current month and set as '.current-month' in title
     */
    var monthNumber = d.getMonth() + 1;


    function GetMonthName(monthNumber) {
      var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      return months[monthNumber - 1];
    }

    setMonth(monthNumber, yearNumber, mon, tue, wed, thur, fri, sat, sund);

    function setMonth(monthNumber, yearNumber, mon, tue, wed, thur, fri, sat, sund) {
      $('.month').text(GetMonthName(monthNumber) + ' ' + yearNumber);
      $('.month').attr('data-month', monthNumber);
      $('.month').attr('data-year', yearNumber);
      printDateNumber(monthNumber, yearNumber, mon, tue, wed, thur, fri, sat, sund);
    }

    $(".btn-next").unbind('click');
    $('.btn-next').on('click', function() {
      var monthNumber = $('.month').attr('data-month');
      var yearNumber = $('.month').attr('data-year');
      if (monthNumber > 11) {
        $('.month').attr('data-month', '0');
        var monthNumber = $('.month').attr('data-month');
        setMonth(parseInt(monthNumber) + 1, parseInt(yearNumber) + 1, mon, tue, wed, thur, fri, sat, sund);
        fetchEventData();
      } else {

        setMonth(parseInt(monthNumber) + 1, yearNumber, mon, tue, wed, thur, fri, sat, sund);
        fetchEventData();
      };
    });

    $(".btn-prev").unbind('click');
    $('.btn-prev').on('click', function() {
      var monthNumber = $('.month').attr('data-month');
      var yearNumber = $('.month').attr('data-year');
      if (monthNumber < 2) {
        $('.month').attr('data-month', '13');
        var monthNumber = $('.month').attr('data-month');
        setMonth(parseInt(monthNumber) - 1, parseInt(yearNumber) - 1, mon, tue, wed, thur, fri, sat, sund);
        fetchEventData();
      } else {
        setMonth(parseInt(monthNumber) - 1, yearNumber, mon, tue, wed, thur, fri, sat, sund);
        fetchEventData();
      };
    });


    /**
     * Get all dates for current month
     */

    function printDateNumber(monthNumber, yearNumber, mon, tue, wed, thur, fri, sat, sund) {

      $($('tbody.event-calendar tr')).each(function(index) {
        $(this).empty();
      });

      $($('thead.event-days tr')).each(function(index) {
        $(this).empty();
      });

      function getDaysInMonth(month, year) {
        // Since no month has fewer than 28 days
        var date = new Date(year, month, 1);
        var days = [];
        while (date.getMonth() === month) {
          days.push(new Date(date));
          date.setDate(date.getDate() + 1);
        }
        return days;
      }

      i = 0;

      setDaysInOrder(mon, tue, wed, thur, fri, sat, sund);

      function setDaysInOrder(mon, tue, wed, thur, fri, sat, sund) {
        var monthDay = getDaysInMonth(monthNumber - 1, yearNumber)[0].toString().substring(0, 3);
        if (monthDay === 'Mon') {
          $('thead.event-days tr').append('<td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td>');
        } else if (monthDay === 'Tue') {
          $('thead.event-days tr').append('<td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td>');
        } else if (monthDay === 'Wed') {
          $('thead.event-days tr').append('<td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td>');
        } else if (monthDay === 'Thu') {
          $('thead.event-days tr').append('<td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td>');
        } else if (monthDay === 'Fri') {
          $('thead.event-days tr').append('<td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td>');
        } else if (monthDay === 'Sat') {
          $('thead.event-days tr').append('<td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td>');
        } else if (monthDay === 'Sun') {
          $('thead.event-days tr').append('<td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td>');
        }
      };
      $(getDaysInMonth(monthNumber - 1, yearNumber)).each(function(index) {
        var index = index + 1;
        if (index < 8) {
          $('tbody.event-calendar tr.1').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
        } else if (index < 15) {
          $('tbody.event-calendar tr.2').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
        } else if (index < 22) {
          $('tbody.event-calendar tr.3').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
        } else if (index < 29) {
          $('tbody.event-calendar tr.4').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
        } else if (index < 32) {
          $('tbody.event-calendar tr.5').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
        }
        i++;
      }
      );
      var date = new Date();
      var month = date.getMonth() + 1;
      var thisyear = new Date().getFullYear();
      setCurrentDay(month, thisyear);
      fetchEventData();


    };

    /* Fetch event data from json
     * and set events in calendar
     */

    function fetchEventData(){
        var viewMonth = $('.month').attr('data-month');
        var viewYear = $('.month').attr('data-year');
        var data = 'current_year=' + viewYear + '&current_month=' + viewMonth + '&req_type=event_date';

        $.ajax({
            type: "POST",
            url: "php/function.php",
            data: data,
            dataType: 'json',
            async: false,
            success: function (data) {
                $.each(data, function(i){
                    var day = data[i].event_day;
                    $('tbody.event-calendar td[date-day="' + day + '"]').addClass('event');
                })

            }
        });
    }

    /**
     * Get current day and set as '.current-day'
     */
    function setCurrentDay(month, year) {
      var viewMonth = $('.month').attr('data-month');
      var eventYear = $('.event-days').attr('date-year');
      if (parseInt(year) === yearNumber) {
        if (parseInt(month) === parseInt(viewMonth)) {
          $('tbody.event-calendar td[date-day="' + d.getDate() + '"]').addClass('current-day');
        }
      }
    };

   /**
     * Add class '.active' on calendar date
     * and show event details
   */

    $('tbody.event-calendar').unbind('click');
    $('tbody.event-calendar').on('click', 'td', function(e) {
        if ($(this).hasClass('active')) {
            $('tbody.event-calendar td').removeClass('active');
            $('.list-event').css('display', 'none');
            $('.calendar-container').css({'width': '510px', 'left': '50%'});
            $('.calendar').css({'width':'100%'});
        } else{
            if ($(this).hasClass('event')){
                $('tbody.event-calendar td').removeClass('active');
                var eventDay = $(this).attr('date-day');
                var eventMonth = $(this).attr('date-month');
                var eventYear = $(this).attr('date-year');
                $(this).addClass('active');
                fetchEventDetails(eventDay,eventMonth,eventYear);
                $('.list-event').css('display','block');
                $('.calendar-container').css({'width': '1000px', 'left': '10%'})
                $('.calendar').css({'width':'45%'});
            } else{
                $('tbody.event-calendar td').removeClass('active');
                $(this).addClass('active');
                $('.list-event').css('display','none');
                $('.calendar-container').css({'width': '510px', 'left': '50%'});
                $('.calendar').css({'width':'100%'});
            }

        };
    });
    $('#event-cal-modal').on('hidden.bs.modal', function () {
        $('.list-event').css('display','none');
        $('.calendar-container').css({'width': '510px', 'left': '50%'});
        $('.calendar').css({'width':'100%'});
    });

    function fetchEventDetails(eventDay,eventMonth,eventYear){

        var data = 'current_year=' + eventYear + '&current_month=' + eventMonth + '&current_day=' + eventDay + '&req_type=event_details';
        $.ajax({
            type: "POST",
            url: "php/function.php",
            data: data,
            dataType: 'json',
            async: false,
            success: function (data) {
                $.each(data, function(i){
                    $('#event_title').html(data[i].event_title);
                    $('#event_date').html(data[i].event_date);
                    $('#event_details').html(data[i].event_desc);
                    $('#event_insti').find('span').html(data[i].event_insti);
                    $('#event_min').find('span').html(data[i].event_min);
                    $('#event_max').find('span').html(data[i].event_max);
                    $('.day-event').attr('event-id',data[i].event_code);
                    var event_uni_flag = data[i].event_uni_flag;
                    if (event_uni_flag=='Y'){
                        $('#event_type').find('span').html("This event is open to all.");
                    }
                    else if(event_uni_flag=='N'){
                        $('#event_type').find('span').html("This event is only for organizing instituition.");
                    }

                })

            }
        });

    }

 }
