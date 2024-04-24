function showLoginForm(role) {
    document.querySelectorAll('.login-form').forEach(function(form) {
        form.classList.remove('active');
    });
    document.getElementById(role + 'LoginForm').classList.add('active');
}

// Get all LoginAs buttons
var buttons = document.querySelectorAll('.LoginAs button');

// Add event listener to each button
buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Set opacity to 1 for the clicked button
        this.style.opacity = 1;
        
        // Reset opacity for other buttons
        buttons.forEach(function(otherButton) {
            if (otherButton !== button) {
                otherButton.style.opacity = 0.3;
            }
        });
    });
});
