@extends('frame')


@section('content')
    <div id='calendar'></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                validRange: {
                    start: '2022-12-01',
                    end: '2022-12-25'
                },

                dateClick: function(info) {
                          
                    window.location.href = "/" + info.date.getDate();

                    info.dayEl.style.backgroundColor = 'red';
                }
            });
            calendar.render();
        });
    </script>
@endsection
