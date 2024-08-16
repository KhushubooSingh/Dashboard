document.addEventListener('DOMContentLoaded', function() {
    fetch('assets/php/fetch-pf-options.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('pf_no').innerHTML += data;
        });
});

// Fetch task details when PF No. changes
document.getElementById('pf_no').addEventListener('change', function() {
    const pfNo = this.value;
    if (pfNo) {
        fetch('assets/php/fetch-emp-task.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams('pf_no=' + pfNo)
        })
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                document.getElementById('task_id').value = data[0].task_id;
                document.getElementById('task_name').value = data[0].task_name;
            } else {
                document.getElementById('task_id').value = '';
                document.getElementById('task_name').value = '';
            }
        });
    }
});


document.getElementById('logout-button').addEventListener('click', function() {
    // Clear local storage
    localStorage.clear(); // Or use sessionStorage.clear() if you're using session storage

    // Redirect to the home page
    window.location.href = 'auth-emp-task-access.php'; // Replace with your actual home page URL
});

