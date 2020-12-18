$("#pais").change(event => {
	$.get(`provincias/${event.target.value}`, function(res, sta){
		$("#provincia").empty();
		res.forEach(element => {
			$("#provincia").append(`<option value=${element.id}> ${element.nombre} </option>`);
		});
	});
});
$("#provincia").change(event => {
    $.get(`ciudades/${event.target.value}`, function(res, sta){
        $("#ciudad").empty();
        res.forEach(element => {
            $("#ciudad").append(`<option value=${element.id}> ${element.nombre} </option>`);
        });
    });
});
