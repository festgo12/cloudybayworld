const distance = document.querySelectorAll('.distance');
const confirmButton = document.querySelector('.confirm');
const body = document.querySelector('body');
const backButton = document.querySelector('#arrowleft');

distance.forEach(tdata => {
    tdata.addEventListener('click', ()=>{
        if(!body.classList.contains('alert')){
            body.classList.add('alert')
        }
    });
});

backButton.addEventListener('click', ()=> {
    if(body.classList.contains('alert')){
        body.classList.remove('alert');
    }
});

confirmButton.addEventListener('click', ()=> {
    if(!body.classList.contains('alert')){
        body.classList.add('alert')
    }
});

