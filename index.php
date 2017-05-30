<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Workers</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                
                $("#btn_filtro").click(function(){
                    
                    var array = [3,2,1,4,3,2,1,5,4,3,0,65,4,4,6,7,8,9,7,5,5];
                    for(var i=0; i<3000; i++){
                        array.push(Math.floor((Math.random() * 10000) + 1));               
                    }   
                
                    var param = [$("#filtro").val()];
                    var array2 = [param, array];
                    
                    
                    var worker = new Worker('quicksort.js');
                    worker.addEventListener('message', function(e) {
                      console.log('Worker said: ', e.data);
                    }, false);

                    worker.postMessage(array2);
                });
            });

        </script>
    </head>
    <body>
        <label for="filtro" >Filtro para el arreglo</label>
        <input type="text" id="filtro">
        <button id="btn_filtro"> Filtrar </button>
    </body>
</html>
