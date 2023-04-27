


function main(){
    console.log('Welcome to Home.js');
    let form = document.querySelector('.indexUser');
    let inputField = document.querySelector('.inputIndexSearch');

    inputField.addEventListener('keyup',event=>{
        console.log('suuu');
        if (event.keyCode === 13) {
            form.submit();
          }
    })
}
document.addEventListener('onload',main());




