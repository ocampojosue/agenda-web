document.addEventListener("DOMContentLoaded", function () {
    let formulario = document.getElementById("form");

    var calendarEl = document.getElementById("agenda");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        locale: "es",
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
        },
        dateClick: function (info) {
            $("#event").modal("show");
        },
    });
    calendar.render();

    document
        .getElementById("btnGuardar")
        .addEventListener("click", function () {
            const datos = new FormData(formulario);
            console.log(datos); //Muestra los datos del formulario
            console.log(formulario); //Muestra el valor del input title
        });
});
