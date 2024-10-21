// Function to show an alert if the status is successful
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status === 'success') {
        alert('updated successfully!');
    }
};