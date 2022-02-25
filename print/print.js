function printDiv(print) {
    var printContents = document.getElementById("print").innerHTML;
    var title = document.title;    
   	var originalContents = document.body.innerHTML;      
   	document.body.innerHTML = printContents;     
   	window.print();
   	document.body.innerHTML = originalContents;
   }