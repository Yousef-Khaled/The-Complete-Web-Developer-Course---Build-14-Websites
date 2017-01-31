 function getRandomColor() {
              var letters = '0123456789ABCDEF'.split('');
              var color = '#';
              for (var i = 0; i < 6; i++ ) {
                  color += letters[Math.floor(Math.random() * 16)];
                }
             return color;
            }
          var a , b , c;
            function make_box() { 
               var x = Math.random() * 500;
               setTimeout(function() {
                         if (Math.random() > 0.5)
                {
                  document.getElementById('box').style.borderRadius = "100px";
                }
                else{
                  document.getElementById('box').style.borderRadius = "0px";
                }
                document.getElementById('box').style.top = (Math.random() * 300) +"px";
                 document.getElementById('box').style.left = (Math.random() * 1000) +"px";
               document.getElementById('box').style.display = "block";
               document.getElementById('box').style.backgroundColor = getRandomColor();
                a = Date.now();
                
                 }, x);
           }
          document.getElementById('box').onclick= function (){
            b = Date.now();
            c = (b - a) / 1000;
            document.getElementById("time").innerHTML = c;
            this.style.display  = "none";
            make_box();
          }
          make_box();