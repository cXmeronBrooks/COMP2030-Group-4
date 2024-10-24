function ShowPassword(){
    var pass = document.getElementsByName('password');
    if(pass.type === "password"){
        pass.type = "text";
    }else{
        pass.type = "password";
    }
}

window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status === 'success') {
        alert('updated successfully!');
    }
}
