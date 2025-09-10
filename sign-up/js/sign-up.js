/*
Andrew Whitehead
400581822
March 12, 2025
Check if an email follows a minimally correct format
If there is no dot, tell user to add it, then prevent form submission
*/
window.addEventListener("load", function() {
    
    document.getElementById("form").addEventListener("submit", function(event) {
        let email = document.getElementById("email").value;
        let error = document.getElementById("error");
        
        if (!email.includes('.')) {
            error.innerHTML = "Invalid email, please re-enter";
            event.preventDefault();
        }
    });
});