// ------------------------------------------------
// allows linking directly to tab name .ie: #report
// ------------------------------------------------

$(function() {
   var hash = window.location.hash;
   if (hash) {
     $('.nav-tabs a[href="' + hash + '"]').tab('show');
   }
 });
 
// ----------------------------------------------
// Save Settings status text: show, then fade out
// ----------------------------------------------

$(function() {
$("#mainform").submit(function() {
 $('#settingsModal').modal('hide');
// $('#logout').blur(); tried to use to get rid of focus color after modal closing
// e.preventDefault() using return false instead of this for now
 $.ajax({
  url: "save_settings.php",
  type: 'post',
  data: $('#mainform').serialize(),
  success: function(response){
	console.log(response);
    // on success
	if ( response.indexOf("Saved") > -1 ) {
	$('#status_text').css({
		color: 'green'
	});
	$('#status_text').text(response);
	$("#status_text").delay(3000).fadeOut(2000,function() {
		$("#status_text").empty().show();
	});
	}
	else {
		$('#status_text').css({
		color: '#990000'
	});
	$('#status_text').text(response);
	}
  },
  error: function(){
    // on failure;
	console.log("Error: Could not divide by zero");
	$('#status_text').css({
		color: '#990000'
	});
	$('#status_text').text("Error: Could not divide by zero");
  }
});
  return false;
});
});


// ---------------------------------------------------------------------
// Test Reort Status: status of running then completed with '...' during
// ---------------------------------------------------------------------
$(function() {
    $("#test_report_form").submit(function() {
			$('#test_report_button').attr("disabled", true);
			$('#testReportModal').modal('hide');
			$.ajax({
				xhr: function () {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function (evt) {
						if (evt.lengthComputable) {
							if (evt.lengthComputable) {
								console.log("start");
								$('#status_text').css({
									color: 'red'
								});
								$('#status_text').text("Test Report: Running");
								$('.status').css({
									visibility: 'visible'
								});
							}
						}
					}, false);

					xhr.addEventListener("progress", function (evt) {
						if (evt.lengthComputable) {
							console.log("end");
							$('#status_text').css({
									color: 'green'
							});
							$('.status').css({
								visibility: 'hidden'
							});
						}
					}, false);

					return xhr;
				},
				type: 'POST',
				url: "test_report.php",
				data: { 'test_details' : $('input:checkbox:checked').val(),
						test_report: "test_report"},
				success: function (data) {
					$('#status_text').text("Test Report: Finished");
				},
				complete: function (data){
                    $('#test_report_button').attr("disabled", false);
                }
			});
			return false;
	});
});

// ---------------------------------------------------------------------
// Get Token
// ---------------------------------------------------------------------

$(function() {
$("#get_token_form").submit(function() {
 $('#tokenModal').modal('hide');
 $.ajax({
  url: "gettoken-pipes.php",
  type: 'post',
  data: $('#get_token_form').serialize(),
  success: function(response){
	var json = $.parseJSON(response);
    // on success
	if ( response.indexOf("Saved") > -1 ) {
	$('#plex_token').val(json.token);
	$('#status_text').css({
		color: 'green'
	});
	$('#status_text').text(json.statustext);
	$("#status_text").delay(3000).fadeOut(2000,function() {
		$("#status_text").empty().show();
	});
	}
	// on credential failure
	else {
		console.log(response);
		$('#status_text').css({
		color: '#990000'
	});
	$('#status_text').text(json.statustext);
	$("#status_text").delay(4000).fadeOut(2000,function() {
		$("#status_text").empty().show();
	});
	}
  },
  error: function(){
    // on failure
	console.log(response);
	$('#status_text').css({
		color: '#990000'
	});
	$('#status_text').text("Error: Could not divide by zero");
	$("#status_text").delay(3000).fadeOut(2000,function() {
		$("#status_text").empty().show();
	});
  }
});
  return false;
});
});

// ---------------- END --------------------