//Header functions.

function signout(){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                response = this.responseText;
                //Calls a seperate function to do continued verification with the server's information.
                cVerify(this.responseText);
            }
        };
        xmlhttp.open("GET", "/signout", true);
        xmlhttp.send();
        
        //Reploads the page after after Session variables are deleted.
        location.reload();
}

//End of header functions.








//Home page functions.
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
//End of home page functions.


//Sign in page functions.

//To switch between sign in and sign up forms.
function sign(){
    $("#signin").toggleClass("Hide");
    $("#signup").toggleClass("Hide");
}

//To verify sign up information that existing usernames and passwords.
function verify(){
    var userName = $("#testUser").val();
    var email = $("#email").val();
    var response; //Response from server.
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                response = this.responseText;
                //Calls a seperate function to do continued verification with the server's information.
                cVerify(this.responseText);
            }
        };
        xmlhttp.open("GET", "/verify?User=" + userName + "&Email=" + email, true);
        xmlhttp.send();


        
}

function cVerify(response){
    //Splits this for username and email verification.
    response = response.trim().split(",");

    //If the username is taken.
    if(response[0] == "true"){
        $("#testUser").val("");
        $("#testUser").focus();
        $("#error").html("Username already exists.");
    }
    //If the passwords don't match.
    else if($("#pass1").val() != $("#pass2").val()){
        $("#pass1").val(""); $("#pass2").val("");
        $("#pass1").focus();
        $("#error").html("Passwords do not match.");
    }
    //If the passwords are empty.
    else if($("#pass1").val() == "" && $("#pass1").val() == ""){
        $("#pass1").focus();
        $("#error").html("Must enter a password.");
    }
    //If the password is too short.
    else if($("#pass1").val().length < 8){
        $("#pass1").focus();
        $("#error").html("Password too short, must be at least 8 characters long.");
    }
    //If the email was not correctly formatted.
    else if(response[1] == "false"){
        $("#email").val("");
        $("#email").focus();
        $("#error").html("Please enter valid email.");
    }else{
        $("#signup form").submit();
    }
}

//End of sign in page functions.



function sleep(milliseconds) {
    const date = Date.now();
    let currentDate = null;
    do {
      currentDate = Date.now();
    } while (currentDate - date < milliseconds);
  }