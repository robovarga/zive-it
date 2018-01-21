jQuery(document).ready(function($){

	// hide input for changin name
	$(document).find(".caption.input").hide();

	// click event: hide name and show input for changing name
	$(document).on('click', 'h3.user-name', function(e) {
		e.preventDefault();
	
		var valueWrap = $(this).parent(),
			inputWrap = valueWrap.parent().find(".caption.input");
	
		$(this).focus();
	
		valueWrap.hide();
		inputWrap.show();
	});

	// submit event: call ajax request for change name
	$(document).on('submit', '.caption.input form', function(e) {
		e.preventDefault();
		
		var input = $(this).find("input"),
			newName = input.val(),
			inputWrap = input.parent().parent(),
			valueWrap = inputWrap.parent().find(".caption.value"),
			nameH3 = valueWrap.find("h3");
		
		$.ajax({
			dataType: "json",
			method: "POST",
			url: "index.php",
			data: $(this).serialize(),
			success: function (data, status) {
				
				nameH3.text(data.userNewName);
				
				valueWrap.show();
				inputWrap.hide();
				
				console.log(data);
				console.log(status);
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log("response status:", errorThrown);
			}
		});

		return false;
	});

	// fetching new faces every 5 seconds
	setInterval(function(){ fetchFaces(); }, 5000);

});


function fetchFaces() {
	var facesWrap = $('#faces-wrap'),
		currentTimestamp = facesWrap.data('updated');
	
	var data = {
		"do": "fetch-faces",
		"updated": currentTimestamp,
	};

	$.ajax({
		dataType: "json",
		method: "POST",
		url: "index.php",
		data: data,
		success: function (data, status) {
			facesWrap.prepend(data.html);
			facesWrap.data('updated', data.lastUpdated);

			console.log(data);
			console.log(status);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("response status:", errorThrown);
		}
	});
}

 

