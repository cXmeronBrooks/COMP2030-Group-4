function setMenuSelected()
{
    const menu = document.querySelectorAll("#menu a");
    for (let opt of menu) {
        if (document.location.href.includes(opt.href)) {
            opt.classList.add("selected");
            break;
        }
    }
}

setMenuSelected();

// Function to show an alert if the status is successful
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status === 'success') {
        alert('updated successfully!');
    }
};


// Attach a confirmation prompt to delete buttons
document.addEventListener("DOMContentLoaded", () => {
    const deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach((form) => {
        form.addEventListener("submit", (event) => {
            const confirmed = confirm("Are you sure you want to delete this staff member?");
            if (!confirmed) {
                event.preventDefault(); // Prevent form submission if not confirmed
            }
        });
    });
});


