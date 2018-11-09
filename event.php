<?php

session_start();

	if ((!isset($_SESSION['connect'])) || (empty($_SESSION['connect'])))
	{
		
		header('Location: ./layouts/signin.php');
		exit();
	}

?>
<?php 
$title='Événements';
$description='';
session_start();
?>
<?php include_once("./layouts/header.php"); ?>


<main>
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card card-body">

                    <div id="calendar"></div>
                </div>
            </div>
            <div class="col-md-3 mb-5">
                <div class="card card-body">
                    <h3 class="text-center mb-4">Mes Événements</h3>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#calendar').fullCalendar({
                editable: true,
                themeSystem: 'bootstrap4',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,listWeek'
                },
                buttonText: {
                    today: 'Aujourd\'hui',
                    month: 'Mois',
                    week: 'Semaines',
                    day: 'Jour',
                    list: 'Liste'
                },
                themeButtonIcons: {
                    prev: 'circle-triangle-w',
                    next: 'circle-triangle-e',
                    prevYear: 'seek-prev',
                    nextYear: 'seek-next'
                },
                noEventsMessage: 'Aucun événements disponibles',
                firstDay: 1,
                monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet',
                    'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
                ],
                dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi',
                    'Jeudi', 'Vendredi', 'Samedi'
                ],
                dayNamesShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
                events: {
                    url: 'layouts/getEvent.php',
                    data: {
                        id: 'id',
                        title: 'title',
                        start: 'start',
                        end: 'end',
                        location: 'location',
                        desc: 'desc'
                    },
                    error: function() {
                        alert('Il y a une erreur pour récuperer les événements!');
                    },
                    color: 'yellow',
                    textColor: 'black'
                },
                selectable: true,
                selectHelper: true,
                displayEventTime: false,
                eventRender: function(event, element, view) {
                    element.qtip({
                        content: {
                            title: {
                                text: event.title
                            },
                            text: '<span class="title" style="font-weight:bold;">Lieux: </span>' + event.location +
                                '<br><span class="title" style="font-weight:bold;">Description: </span>' + event.desc
                        },
                        position: {
                            adjust: {
                                screen: true
                            },
                            corner: {
                                target: 'bottomMiddle',
                                tooltip: 'top'
                            }
                        },
                        show: {
                            solo: true,
                            effect: {
                                type: 'slide'
                            }
                        },
                        hide: {
                            when: 'mouseout',
                            fixed: true
                        },
                        style: {
                            classes: 'qtip-bootstrap',
                            // Give it a speech bubble tip
                            border: {
                                width: 10,
                                radius: 5,
                                color: '#474968'

                            },
                            title: {
                                color: '#fff',
                                background: '#9193c4'
                            },
                        }


                    });

                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                select: function(start, end, allDay) {
                    var title = prompt('Nom de l\'événement :');
                    var desc = prompt('Description de l\'événement :');

                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                        $.ajax({
                            url: 'layouts/addEvent.php',
                            data: 'title=' + title + '&start=' + start + '&end=' + end + '&desc=' + desc,
                            type: "POST",
                            success: function(data) {
                                $('#calendar').fullCalendar('refetchEvents');
                                alert("Événement créé");
                            }
                        });

                    }
                    $('#calendar').fullCalendar('unselect');
                },
                editable: true,
                eventResize: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "layouts/editEvent.php",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        success: function() {
                            $('#calendar').fullCalendar('refetchEvents');
                            alert("Événement mis à jour");
                        }
                    })
                },
                eventDrop: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "layouts/editEvent.php",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        success: function() {
                            $('#calendar').fullCalendar('refetchEvents');
                            alert("Événement mis à jour");
                        }
                    });
                },
                eventClick: function(event) {
                    if (confirm("Êtes-vous sur de vouloir supprimer cet événement ?")) {
                        var id = event.id;
                        $.ajax({
                            url: "layouts/deleteEvent.php",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function() {
                                $('#calendar').fullCalendar('refetchEvents');
                                alert("Événement supprimé");
                            }
                        })
                    }
                },


            });
        });

    </script>
</main>

<?php include_once("layouts/footer.php"); ?>
