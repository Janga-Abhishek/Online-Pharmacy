<?php
session_start();
include "connection.php";
?>
<?php
if (isset($_SESSION['u_id']) && isset($_SESSION['id'])) {
    $username = $_SESSION['u_id'];
    echo $username;

    $id = $_GET['id'];
    echo $id;
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Booking Calander</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script>
            $(document).ready(function() {

                var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        const queryString = window.location.search;
                        const urlParams = new URLSearchParams(queryString);
                        var id = urlParams.get('id')
                        console.log(id);
                        var deliveryInstructions = prompt("please enter any delivery Instructions");
                        if (deliveryInstructions) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                            $.ajax({
                                url: "insertCalanderinfoPrescription.php",
                                type: "POST",
                                data: {
                                    id: id,
                                    deliveryInstructions: deliveryInstructions,
                                    start: start,
                                    end: end
                                },
                                success: function() {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Thank You...! Your order will be delivered on your selected date and time. ");
                                    window.location.href = "updatePrescriptionStatus.php?id=<?php $id = $_GET['id'];
                                                                                            echo $id; ?>";
                                }
                            })
                        }
                    }

                });
            });
            <?php } ?>
        </script>
    </head>

    <body>
        <br />
        <br />
        <div class="container">
            <div id="calendar"></div>
        </div>
    </body>

    </html>