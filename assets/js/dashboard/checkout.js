var baseUrl = document.querySelector('meta[name=base]').content;


const placeOrderButton = document.querySelector('#placeOrderButton');
const checkOutFrom = document.forms.checkOutFrom;
const alertMessage = document.querySelector('#alertMessage');

/**
 * listen for payment method onChange event and
 * and show current balance if wallet is selected
 * */
([...checkOutFrom.method].forEach(el => el.addEventListener('change', (e) => {
    // exit the function if method is not wallet
    if (e.target.value !== 'wallet') {
        alertMessage.innerHTML = '';
        return false;
    }
    // check if user has enough wallet balance for the purchase
    if (parseInt(checkOutFrom.totalPrice.value) > parseInt(checkOutFrom.walletBalance.value)) {
        alertMessage.innerHTML = `<strong class="text-danger">Your wallet balance (₦${checkOutFrom.walletBalance.value}) is below purchase price</strong>`;
        return false;
    } else {
        alertMessage.innerHTML = `<strong class="text-success">Your wallet balance is ₦${checkOutFrom.walletBalance.value}</strong>`;
        return true;
    }
})));



const handlePlaceOrder = (event) => {
    event.preventDefault();
    // make sure required fields are not empty
    if (!validateCheckOutFrom()) {
        alertMessage.innerHTML = `<strong class="text-danger">${'Please fill all the required fields'}</strong>`;
        return false;
    }
    // check which payment methed the user is using
    switch (checkOutFrom.method.value) {
        case 'wallet':
            // check if user has enough wallet balance for the purchase
            if (parseInt(checkOutFrom.totalPrice.value) > parseInt(checkOutFrom.walletBalance.value)) {
                alertMessage.innerHTML = `<strong class="text-danger">Your wallet balance (₦${checkOutFrom.walletBalance.value}) is below purchase price</strong>`;
                return false;
            } 

            handleCheckoutWithWallet(checkOutFrom);
            break;
        case 'paystack':
            payWithPaystack(checkOutFrom);
            break;
        default:
            checkOutFrom.submit();
            break;
    }
}

/**
 * listen for placeOrderButton Onclick event and call 
 * the 'handlePlaceOrder' function when clicked
 * */
placeOrderButton.addEventListener('click', handlePlaceOrder);

const payWithPaystack = (checkOutFrom) => {

    var handler = PaystackPop.setup({
        key: 'pk_test_4837d640a1bc74133a9eb9c33eb7fd7fd8f89c79', //put your public key here
        email: checkOutFrom.email.value, //put your customer's email here
        amount: checkOutFrom.totalPrice.value * 100, //amount the customer is supposed to pay in kobo
        metadata: {
            custom_fields: [
                {
                    display_name: "Mobile Number",
                    variable_name: "mobile_number",
                    value: "+0000000000000" //customer's mobile number
                }
            ]
        },
        callback: function (response) {
            //after the transaction have been completed
            // store payment data
            console.log(response);
            handleCheckoutWithPaystack(checkOutFrom, response.reference);
            // submit funding form
            // checkOutFrom.submit();
        },
        onClose: function () {
            //when the user close the payment modal
            alert('Transaction cancelled');
        }
    });
    handler.openIframe(); //open the paystack's payment modal
}

const handleCheckoutWithPaystack = (checkOutFrom, reference) => {
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/checkoutWithPaystack`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                user_id: checkOutFrom.user_id.value,
                amount: checkOutFrom.totalPrice.value,
                reference: reference
            })
        });
        const content = await rawResponse.json();
        // console.log(content);
        checkOutFrom.payment_status.value = "Completed";
        checkOutFrom.submit();
    })();
}

const handleCheckoutWithWallet = (checkOutFrom) => {
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/checkoutWithWallet`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                user_id: checkOutFrom.user_id.value,
                amount: checkOutFrom.totalPrice.value,
            })
        });
        const content = await rawResponse.json();
        // console.log(content);
        checkOutFrom.payment_status.value = "Completed";
        checkOutFrom.submit();
    })();
}

const validateCheckOutFrom = () => {
    if (checkOutFrom.firstname.value == '' || checkOutFrom.lastname.value == '' ||
        checkOutFrom.phone.value == '' || checkOutFrom.email.value == '' ||
        checkOutFrom.customer_country.value == '' || checkOutFrom.address.value == '' ||
        checkOutFrom.city.value == '' || checkOutFrom.state.value == '' ||
        checkOutFrom.pickup_location.value == '' || checkOutFrom.zip.value == '') {
        return false;
    } else {
        return true;
    }
}