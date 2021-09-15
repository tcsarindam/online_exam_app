//custom JS FILE
$(document).on('submit','.database_operation',function(){

	//alert('testing');
	var url = $(this).attr('action');
	//alert(url);
	var data = $(this).serialize();
	//console.log(data);
	$.post(url,data,function(fb){

		//alert(fb);
		//for json data fallback
		//var resp = $.parseJSON(fb);
		//console.log(resp);
		// JSON check ends
		var resp = $.parseJSON(fb);
		if(resp.status == 'true')
		{
			alert(resp.message);
			setTimeout(function(){
				window.location.href = resp.reload;
			},1000);
		}
		else
		{
			alert(resp.message);
		}
		
	});
	return false;
});

// status field change in exam category module
$(document).on('change','.category_status',function(){

	//alert('clicked');
	var id=$(this).attr('data-id');
	//alert(id);
	$.get(BASE_URL+'/admin/category_status/'+id,function(fb){

		alert('Exam category Status successfully changed');
	})

});


// status field change in exam master module
$(document).on('change','.exam_status',function(){

	//alert('clicked');
	var id=$(this).attr('data-id');
	//alert(id);
	$.get(BASE_URL+'/admin/exam_status/'+id,function(fb){

		alert('Exam Status successfully changed');
	})

});

// status field change in student master module
$(document).on('change','.student_status',function(){

	//alert('clicked');
	var id=$(this).attr('data-id');
	//alert(id);
	$.get(BASE_URL+'/admin/student_status/'+id,function(fb){

		alert('Exam Status successfully changed');
	})

});

// status field change in Manage Portal module
$(document).on('change','.portal_status',function(){

	//alert('clicked');
	var id=$(this).attr('data-id');
	//alert(id);
	$.get(BASE_URL+'/admin/portal_status/'+id,function(fb){

		alert('Portal Status successfully changed');
	})
	

});

// status field change in Add Question section


$(document).on('change','.exam_question_status',function(){

	//alert('clicked');
	var id=$(this).attr('data-id');
	//alert(id);
	$.get(BASE_URL+'/admin/exam_question_status/'+id,function(fb){

		alert('Question Status successfully changed');
	})
	

});

// countdown timer
/*
var interval;
function countdown()
{
	clearInterval(interval);
	interval=setInterval(function(){

		//var timer = $('.js-timeout').html();
		var presentTime = document.getElementById('timer').innerHTML;
		timer = presentTime.split(':');
		var minutes = timer[0];
		var seconds = timer[1];
		seconds -= 1;
		if(minutes < 0)
		{
			return;
		}
		else if(seconds < 0 && minutes!=0){
			 minutes - = 1;
			 seconds = 59;
		}
		else if(seconds < 10 && length.seconds != 2) 
		{
				seconds = '0' + seconds;
		}

		//$('.js-timeout').html(minutes + ':' + seconds);
		document.getElementById('timer').innerHTML =  minutes + ":" + seconds;
		if(minutes == 0 && seconds == 0)
		{
			clearInterval(interval);
			alert('Time Up');
		}
	},1000);

}

//$('.js-timeout').text("60:00");
document.getElementById('timer').innerHTML =
countdown();

*/

document.getElementById('timer').innerHTML =
  01 + ":" + 11;
startTimer();


function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m<0){
    return
  }
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  if(m == 0 && s == 0)
		{
			alert('Time Up');
			//document.myform.submit();
			document.getElementById("myform").submit();
			alert("Exam Submitted");
			
		}
  //console.log(m)
  setTimeout(startTimer, 1000);

  
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}


///

/*
 $(document).ready(function() {
                        var timer;
                            $('#yurl').on('keyup', function() {
                                var value = this.value;

                                clearTimeout(timer);

                                timer = setTimeout(function() {

                                    //do your submit here
                                    $("#ytVideo").submit()
                                    alert('submitted:' + value);
                                }, 2000);
                            });


     //then include your submit definition. What you want to do once submit is executed
      $('#ytVideo').submit(function(e){
           e.preventDefault(); //prevent page refresh
           var form = $('#ytVideo').serialize();
           //submit.php is the page where you submit your form
           $.post('submit.php', form, function(data){ 
              //do something with the data

           });
      });

});

*/