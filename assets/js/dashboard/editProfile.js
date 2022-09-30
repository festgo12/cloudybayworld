var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
// var baseUrl = getUrl.protocol + "//" + getUrl.host ;
// var baseUrl = getUrl.origin;

// Get all the form input elements using a query selector
const userBio = document.querySelector('#userBio');
const contactNo = document.querySelector('#contactNo');
const websiteUrl = document.querySelector('#websiteUrl');
const companyName = document.querySelector('#companyName');
const username = document.querySelector('#username');
const email = document.querySelector('#email');
const firstname = document.querySelector('#firstname');
const lastname = document.querySelector('#lastname');
const homeAddress = document.querySelector('#homeAddress');
const city = document.querySelector('#city');
const zipCode = document.querySelector('#zipCode');
const countryId = document.querySelector('#countryId');
const aboutUser = document.querySelector('#aboutUser');
// get the submit button elements
let submitButtons = document.getElementsByClassName('submitButtons');
// get the authenticated user Id
const userId = document.querySelector('#userId');

// store the current input data in a object
const inputData = {
    userBio: userBio.value,
    contactNo: contactNo.value,
    websiteUrl: websiteUrl.value,
    companyName: companyName.value,
    username: username.value,
    email: email.value,
    firstname: firstname.value,
    lastname: lastname.value,
    homeAddress: homeAddress.value,
    city: city.value,
    zipCode: zipCode.value,
    aboutUser: aboutUser.value, 
}

/**
 * The 'handleSubmit' takes an event an arg,
 * prevents default form submit behaviour,
 * checks if the any of the input data was changed,
 * then sends a POST request with the changed input data 
 */
const handleSubmit = (event) => {
    event.preventDefault();

    let changedData = {};
    let isChangedDataEmpty = true;

    Object.keys(inputData).map(key => {
        if(inputData[key] !== window[key].value){
            changedData[key] = window[key].value;
            isChangedDataEmpty = false;
        }
    });
    
    // send a post request to the server if the changed data is not empty
    if(!isChangedDataEmpty){
        (async () => {
            const rawResponse = await fetch(`${baseUrl}/api/editProfile/${userId.value}`, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(changedData)
            });
            const content = await rawResponse.json();
            console.log(content); 
            /**
             * check the response status and message
             * map through and display the response messages
             */
            if(content.error){
                const elCollection = document.getElementsByClassName('serverMessage');
                ([...elCollection].map(el => el.innerHTML = `<strong class="text-danger">${content.message}</strong>`))
            }else{
                const elCollection = document.getElementsByClassName('serverMessage');
                ([...elCollection].map(el => el.innerHTML = `<strong class="text-success">${content.message}</strong>`))
            }
        })();
    }
}

/**
 * Monitor onclick events for both submit buttons,
 * If the button is clicked, 
 * call a function that sends a POST request 
 * if any of the input data has changed.
 */
([...submitButtons].forEach(el => el.addEventListener('click', handleSubmit)));

