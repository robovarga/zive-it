//Navbar Toggle

$('.navbar-toggle').click(function(){
  if( $(this).hasClass('collapsed') ){
    $(this).removeClass('collapsed');
  }else{
    $(this).addClass('collapsed');
  }
 })
 
 
// Back to top Arrow
 
 jQuery(document).ready(function($){

	$(document).find(".caption.input").hide();

	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top, .top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

	$(document).on('click', 'h3.user-name', function(e) {
		e.preventDefault();
	
		var valueWrap = $(this).parent(),
			inputWrap = valueWrap.parent().find(".caption.input");
	

		$(this).focus();
	
		valueWrap.hide();
		inputWrap.show();
	
		// console.log(valueWrap);
		// console.log(inputWrap);
	});

	$(document).on('submit', '.caption.input form', function(e) {
		e.preventDefault();
		
		var input = $(this).find("input"),
			newName = input.val(),
			inputWrap = input.parent().parent(),
			valueWrap = inputWrap.parent().find(".caption.value"),
			nameH3 = valueWrap.find("h3");
			
			
			// console.log(newName);
			
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
				// console.log(jqXHR);
				console.log("response status:", errorThrown);
			}
		});

		return false;
	});


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
			
			// nameH3.text(data.userNewName);
			
			// valueWrap.show();
			// inputWrap.hide();
			
			facesWrap.prepend(data.html);
			facesWrap.data('updated', data.lastUpdated);

			console.log(data);
			console.log(status);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			// console.log(jqXHR);
			console.log("response status:", errorThrown);
		}
	});
}

 

