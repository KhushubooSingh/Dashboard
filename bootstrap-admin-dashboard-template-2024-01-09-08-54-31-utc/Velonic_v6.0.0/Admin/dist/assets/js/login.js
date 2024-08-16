document.addEventListener('DOMContentLoaded', function() {
    const backButton = document.getElementById('backButton');
    
    backButton.addEventListener('click', function() {
        window.location.href = 'index.php'; // Redirect to the login page
    });
});



function validateDates() {
    const fromDate = new Date(document.getElementById('duration_from').value);
    const toDate = new Date(document.getElementById('duration_to').value);

    if (fromDate > toDate) {
        alert('The "Course Duration From" date cannot be after the "Course Duration To" date.');
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}

document.addEventListener('DOMContentLoaded', function() {
    const logOutButton = document.getElementById('logout-btn');
    
    if (logOutButton) { // Ensure the button exists
        logOutButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default behavior if necessary
            window.location.href = 'auth-logout.php'; // Redirect to the logout page
        });
    } else {
        console.error('Logout button not found.');
    }
});


// function formatDate(dateStr) {
//     const [year, month, day] = dateStr.split('-');
//     return `${day}-${month}-${year}`;
// }

// function displayFormattedDate() {
//     const input = document.getElementById('duration_from').value;
//     const formattedDate = formatDate(input);
//     document.getElementById('formattedDate').textContent = `Formatted Date: ${formattedDate}`;
// }

document.addEventListener('DOMContentLoaded', function() {
    // Check if the message is set
    if (document.querySelector('.alert')) {
        // Remove the status parameter from the URL
        history.replaceState({}, document.title, window.location.pathname);
    }
});