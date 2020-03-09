//Page Variables
var user;



//Header functions.

function signout() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //Reploads the page after after Session variables are deleted.
            location.reload();
        }
    };
    xmlhttp.open("GET", "/signout", true);
    xmlhttp.send();


}


//End of header functions.








//Home page functions.

//Searches for the desired file by removing the others
function search() {
    //Grabs the array of links.
    var items = $(".item").toArray();
    //Loops through all the values.
    for (var i = 0; i < items.length; i++) {
        if (items[i].innerHTML.toLowerCase().search($("#search").val().toLowerCase()) == -1) {
            //Sets the element's grandparent to display none.
            items[i].parentElement.parentElement.style.display = "none";
        } else {
            //Sets the element's grandparent to display normal.
            items[i].parentElement.parentElement.style.display = "";
        }
    }


}

//This is so when the user wants to update something like their email, the validation system
//doesn't stop them because their username "already exists in the database."
function setOriginalVars() {
    user = $("#user").val();
}

function FileDelete(id) {

    var obj = $("#" + id);

    //Asks the user if they want to delete that file.
    if (confirm("Are you sure you want to delete: " + obj.html().trim() + "?")) {
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
        obj.parent().parent().remove();
    }
}

//Checks to make sure that files have been loaded before sent to the server.
function loadedFiles() {
    if ($("#files").val() == "") {
        alert("Must upload a file.");
    } else {
        $("#files").parent().submit();
    }
}

//To update user's personal information.
function updateInfo() {
    var userName = $("#user").val();
    var email = $("#email").val();

    var response; //Response from server.
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
            response = response.split(",");
            //If the username is taken.
            if (response[0] == "true" && $("#user").val() != user) {
                $("#userser").val("");
                $("#user").focus();
                $("#error").html("<span style=\"color:red;\">Username already exists.</span>");
            } //If the email was not correctly formatted.
            else if (response[1] == "false") {
                $("#email").val("");
                $("#email").focus();
                $("#error").html("<span style=\"color:red;\">Please enter valid email.</span>");
            } else {
                //Proceeds to submit the form to update user's personal information.
                $("#error").html("<span style=\"color:green;\">Updating Personal Information...</span>");
                $("#ProfileInfo form").submit();
            }

        }
    };
    xmlhttp.open("GET", "/verify?User=" + userName + "&Email=" + email, true);
    xmlhttp.send();

}

//List out the files for upload
function listFiles() {
    var files = $("#files")[0].files;
    var result = "<strong><u>Queued Files</u></strong><br><ul>";


    for (var i = 0; i < files.length; i++) {
        result += "<li>" + files[i].name + "</li>";
    }
    result += "</ul>"
    $("#filesList").html(result);
}

function delistFiles() {
    $("#filesList").html("");
}
//End of home page functions.


//Sign in page functions.

//To switch between sign in and sign up forms.
function sign() {
    $("#signin").toggleClass("Hide");
    $("#signup").toggleClass("Hide");
}

//To verify sign up information that existing usernames and passwords.
function verify(userName = $("#testUser").val(), email = $("#email").val()) {
    var response; //Response from server.
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText;
            //Calls a seperate function to do continued verification with the server's information.
            return cVerify(this.responseText);
        }
    };
    xmlhttp.open("GET", "/verify?User=" + userName + "&Email=" + email, true);
    xmlhttp.send();



}

function cVerify(response) {
    //Splits this for username and email verification.
    response = response.trim().split(",");

    //If the username is taken.
    if (response[0] == "true") {
        $("#testUser").val("");
        $("#testUser").focus();
        $("#error").html("Username already exists.");
    }
    //If the passwords don't match.
    else if ($("#pass1").val() != $("#pass2").val()) {
        $("#pass1").val("");
        $("#pass2").val("");
        $("#pass1").focus();
        $("#error").html("Passwords do not match.");
    }
    //If the passwords are empty.
    else if ($("#pass1").val() == "" && $("#pass1").val() == "") {
        $("#pass1").focus();
        $("#error").html("Must enter a password.");
    }
    //If the password is too short.
    else if ($("#pass1").val().length < 8) {
        $("#pass1").focus();
        $("#error").html("Password too short, must be at least 8 characters long.");
    }
    //If the email was not correctly formatted.
    else if (response[1] == "false") {
        $("#email").val("");
        $("#email").focus();
        $("#error").html("Please enter valid email.");
    } else {
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