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

        .btnC{
          margin-left: 38%;
          margin-top: 10px; 
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
 
              <form>
                <div class = "form-group">
                <input type="text" name="City" class="form-control" placeholder="Eg. Cario , Paris ..." id = "ab">
                </div>
                <button type="button" class="btn btn-lg btn-success btnC" id = "bt">Find My Weather</button>  
              </form>
            <div class="alert alert-info" id = "als"></div>
            <div class="alert alert-danger" id = "alf">Please try again!</div>
            <div class="alert alert-danger" id = "aln">Please enter a city!</div>
          </div>
        </div>
      </div>


  </body>
  <script type="jquery-3.1.0.min.js"></script>
  <script type="text/javascript">
      $("#bt").click(function (event) {
        
        $(".alert").hide();

        if ($("#ab").val() == ""){
          $("#aln").fadeIn();      
        }
        else{
          $.get('scraper.php?City=' + $("#ab").val() , function (data) {
             var n = data.search(/Warning/i);
             
             if (n == -1){
                $("#als").html(data);
                $("#als").fadeIn();
             }
             else{
                $("#alf").fadeIn();
             }
          });
        }

      });


  </script>

</html>
