function FileDelete(id){

    var obj = $("#"+id);

    //Asks the user if they want to delete that file.
    if(confirm("Are you sure you want to delete: "+obj.html().trim()+"?")){
        //AJAX for deleting the file.
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/delete?ID=" + id, true);
        xmlhttp.send();

        //Deletes the Row.
        obj.parent().remove();
    }
}

//For sleeping so the deletion of the file can take effect.
function sleep(miliseconds) {
   var currentTime = new Date().getTime();

   while (currentTime + miliseconds >= new Date().getTime()) {
   }
}