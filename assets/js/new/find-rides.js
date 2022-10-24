const body = document.querySelector('body');
const fuzzySearch = document.querySelectorAll('.location');
const map = document.querySelector('#map');
const bottom = document.querySelector('.bottom');
const riders = document.querySelectorAll('.rider');

fuzzySearch.forEach(item => {
    item.addEventListener('click', ()=> {
        if(!body.classList.contains('map-location')) {
            body.classList.add('map-location');
        }
    })
});

map.addEventListener('click', ()=> {
    if(!body.classList.contains('search-rides')) {
        body.classList.add('search-rides');
    }
});

bottom.addEventListener('click', ()=> {
    if(!body.classList.contains('show-riders')) {
        body.classList.add('show-riders');
    }
});

riders.forEach(rider => {
    rider.addEventListener('click', ()=> {
        if(!body.classList.contains('rider-details')) {
            body.classList.add('rider-details');
        }
    })
});
