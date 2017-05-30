//var array = [10,30,20,11,15,40,38, 2,1,23];
function swap(items, firstIndex, secondIndex){
    var temp = items[firstIndex];
    items[firstIndex] = items[secondIndex];
    items[secondIndex] = temp;
}
function partition(items, left, right) {

    var pivot   = items[Math.floor((right + left) / 2)],
        i       = left,
        j       = right;

    while (i <= j) {
        while (items[i] < pivot) {
            i++;
        }

        while (items[j] > pivot) {
            j--;
        }

        if (i <= j) {
            swap(items, i, j);
            i++;
            j--;
        }
    }

    return i;
}
function quickSort(items, left, right) {

    var index;
    if (items.length > 1) {
        index = partition(items, left, right);
        if (left < index - 1) {
            quickSort(items, left, index - 1);
        }

        if (index < right) {
            quickSort(items, index, right);
        }
    }

    return items;
}

self.addEventListener('message', function(e) {
    var filtro = e.data[0];
    var numeros = e.data[1];
    var result = quickSort(numeros, 0, numeros.length - 1);
    var resultString = result.map(String);
    
    var filtrados = [];
   // var pattern = new RegExp("*." + filtro + ".*");
    for(var i=0; i<resultString.length; i++){
        if(resultString[i].indexOf(filtro) === 0) 
                filtrados.push(resultString[i]);
    }
    
    self.postMessage(filtrados.toString());
}, false);