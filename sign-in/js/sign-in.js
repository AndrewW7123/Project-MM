/**
Name: Evan Burlaca
Student Number: 400574598
Date: March 12, 2025
Description: This is the javascript document for the main login page which ensures that
             the email the user is entering is valid, and gives the user feedback on their
             entry, among other functions.
*/

window.addEventListener("load", function (event) {
    let feedbackBox1 = document.getElementById("feedback1");
    let submitButton = document.getElementById("submit");

    //Redirect the user to the sign up page if requested
    document.getElementById("signUp").addEventListener("click", function(event){
        window.location.href= "../sign-up/index.php";
    });

    //Ensure email is valid; give user feedback for improper email:
    document.getElementById("emailBox").addEventListener("input", function(event){
        let invalid = false; //Assume email is valid
        let fullEmail = this.value; //Get user's current entry

        if (fullEmail.indexOf("@") === -1){ //If no @ sign exists
            submitButton.disabled = true;
            feedbackBox1.innerHTML = "Please include an @ symbol in your email";

        } else {
            //Get part of email following @
            let e = fullEmail.substring(fullEmail.indexOf("@")+1);

            if (!e.includes(".")){ //If no period exists after @
            submitButton.disabled = true;
            feedbackBox1.innerHTML = "Please include a period in your email following the @ symbol";

            } else { //e has a period
                let e1 = e.substring(0, e.indexOf(".")); //characters from @ to .
                let e2 = e.substring(e.indexOf(".")+1); //characters from . to end

                //Check that only alphanumeric characters are present
                if (!/^[a-zA-Z0-9]+$/.test(e1) || !/^[a-zA-Z0-9]+$/.test(e2)){
                    submitButton.disabled = true;
                    feedbackBox1.innerHTML = "Please include only alphanumeric characters on either side of the period";
                } else {
                    submitButton.disabled = false;
                    feedbackBox1.innerHTML = "";
                }
            }
        }
    });
});