<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Weather Scraper</title>

    <!-- Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

    <style type="text/css">
        .container{
        
          background-image:url("background.jpg"); 
          width: 100%;
          height: 100%;
          background-size:cover; 
          background-position:center; 
          padding-top: 7.5%;
        }
        html,body{
          height: 100%;
        }

        .white{
          color: white;
          text-align: center;
        }

        .alert{
          margin-top: 5%;
          display: none;
        }


    </style>

  </head>
  <body>
      <div class = "container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
              <h1 class="white">Weather Predictor</h1>
              <h4 class="white">Enter your city below to get the weather forcast.</h4>
              
 			 <div class = "form-group">
                <input type="text" name="City" class="form-control" placeholder="Eg. Cario , Paris ..." id = "ab">
             </div>
            <div style="margin-left: 33%;">
            <button type="button" class="btn btn-lg btn-success"  id = "bt">Find My Weather</button>  
            </div>
            <div class="alert alert-info" id = "als"></div>
            <div class="alert alert-danger" id = "alf">Please enter a valid City!</div>
            <div class="alert alert-danger" id = "aln">Please enter a city!</div>
          </div>
        </div>
      </div>


  </body>
  <script type="jquery-3.1.0.min.js"></script>
  <script type="text/javascript">
  	

   $(document).keypress(function (e) {
    if (e.which == 13) {
        $("#bt").click();
    }
});

  	$("#bt").click(function () {
  		$("#als").fadeOut();
  		$("#aln").fadeOut();
  		$("#alf").fadeOut();
  		if (!$("#ab").val())
  		{
  			$("#aln").fadeIn();
  			return;
  		}
  		getWeather();
  	});

  	function getWeather()
   {
    
    // Create our XMLHttpRequest object
    //alert(code);
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "scraper.php";
    var vars = "City=" + $("#ab").val();
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var return_data = ""
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
       if(hr.readyState == 4 && hr.status == 200) {
          return_data = hr.responseText;
          var weather = return_data;
          if (return_data.length != 4){
          	$("#als").html(return_data);
          	$("#als").fadeIn();
          }
          else{
          	$("#alf").fadeIn();
          }
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
   }
   
  </script>

</html>
