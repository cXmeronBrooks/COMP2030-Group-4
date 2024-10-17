function ShowPassword(){
    var pass = document.getElementById('password');
    if(pass.type === "password"){
        pass.type = "text";
    }else{
        pass.type = "password";
    }
}

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

