<main>

    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body">
                    <h3 class="text-center mb-4">Événements</h3>
                    <div id="calendar"></div>
                </div>

            </div>
        </div>
    </div>

</main>
<script>
    document.addEventListener('DOMContentLoaded', function() { // page is now ready...
        var calendarEl = document.getElementById('calendar'); // grab element reference

        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'fr',
            selectable: true,
            editable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: '/projet-wis/layouts/getEvent.php',
            selectHelper: true,
            select: function(start, end, allDay) {
                var title = prompt("Entrer un nom pour votre événement");
                if (title) {
                    var start = $.fullCalendar.formatDate(start, "DD-MM-Y HH:mm");
                    var end = $.fullCalendar.formatDate(end, "DD-MM-Y HH:mm");
                    $.ajax({
                        url: "/projet-wis/layouts/addEvent.php",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');
                            alert("Added Successfully");
                        }
                    })
                }
            },
            eventResize: function(event) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url: "/projet-wis/layouts/editEventTitle.php",
                    type: "POST",
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        id: id
                    },
                    success: function() {
                        calendar.fullCalendar('refetchEvents');
                        alert('Event Update');
                    }
                })
            },

            eventDrop: function(event) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url: "editEventTitle.php",
                    type: "POST",
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        id: id
                    },
                    success: function() {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Updated");
                    }
                });
            },

            eventClick: function(event) {
                if (confirm("Are you sure you want to remove it?")) {
                    var id = event.id;
                    $.ajax({
                        url: "/projet-wis/layouts/editEvent.php",
                        type: "POST",
                        data: {
                            id: id
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Removed");
                        }
                    })
                }
            },

        });

        calendar.render();
    });

</script>

<?php include_once("layouts/footer.php"); ?>
