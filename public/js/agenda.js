document.addEventListener("DOMContentLoaded", function () {
    let formulario = document.getElementById("formEvent");

    var calendarEl = document.getElementById("agenda");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        locale: "es",
        displayEventTime: false,
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth",
        },
        events: appUrl + "/evento/mostrar",
        dateClick: function (info) {
            formulario.reset();
            formulario.start.value = info.dateStr;
            formulario.end.value = info.dateStr;
            $("#event").modal("show");
        },
        eventClick: function (info) {
            var evento = info.event;
            axios
                .post(appUrl +"/evento/editar/" + info.event.id)
                .then((response) => {
                    formulario.id.value = response.data.id;
                    formulario.title.value = response.data.title;
                    formulario.description.value = response.data.description;
                    formulario.start.value = response.data.start;
                    formulario.end.value = response.data.end;
                    $("#event").modal("show");
                })
                .catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                });
        },
    });
    calendar.render();

    document
        .getElementById("btnGuardar")
        .addEventListener("click", function () {
            sendData(appUrl +"/evento/agregar");
        });
    document
        .getElementById("btnEliminar")
        .addEventListener("click", function () {
            sendData(
                appUrl +"/evento/borrar/" + formulario.id.value
            );
        });
    document
        .getElementById("btnModificar")
        .addEventListener("click", function () {
            sendData(
                appUrl +"/evento/actualizar/" + formulario.id.value
            );
        });

    function sendData(url) {
        const datos = new FormData(formulario);
        // console.log(datos); //Muestra los datos del formulario
        // console.log(formulario); //Muestra el valor del input title
        //appUrl + /evento/agregar
        axios
            .post(url, datos)
            .then((response) => {
                // console.log(response);
                calendar.refetchEvents();
                $("#event").modal("hide");
            })
            .catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    }
});
