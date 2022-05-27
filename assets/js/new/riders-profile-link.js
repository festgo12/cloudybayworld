const confirmButton = document.querySelector('.confirm');
const wallet = document.querySelector('.wallet');
const body = document.querySelector('body');

confirmButton.addEventListener('click', ()=> {
    if(!body.classList.contains('alert')){
        body.classList.add('alert')
    }
});
wallet.addEventListener('click', ()=> {
    if(!body.classList.contains('show-thank-message')){
        body.classList.add('show-thank-message')
    }
});