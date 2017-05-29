<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            var array = [3,2,1,4,3,2,1,5,4,3,0,65,4,4,6,7,8,9,7,5,5];
            for(var i=0; i<3000; i++){
                array.push(Math.floor((Math.random() * 1000) + 1));               
            }
            
            
            var worker = new Worker('quicksort.js');
            worker.addEventListener('message', function(e) {
              console.log('Worker said: ', e.data);
            }, false);

            worker.postMessage(array);
        </script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
