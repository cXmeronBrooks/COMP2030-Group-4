function ShowPassword(){
    var pass = document.getElementById('password');
    if(pass.type === "password"){
        pass.type = "text";
    }else{
        pass.type = "password";
    }
}