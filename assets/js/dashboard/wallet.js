const depositProceedButton = document.querySelector('#depositProceedButton');
const depositModalCloseButton = document.querySelector('#depositModalCloseButton');
const fundingForm = document.forms.fundingForm;

const handleContinuePayment = (event) => {
    event.preventDefault();
    // make sure entered funding amout is a valid amount
    if (isNaN(fundingForm.amount.value) || fundingForm.amount.value < 1) {
        // do nothing
        return false;
    }
    // call paystack handler
    payWithPaystack(fundingForm);
    // close funding Modal
    depositModalCloseButton.click();
}

/**
 * listen for depositProceedButton Onclick event and call 
 * the 'handleContinuePayment' function when clicked
 * */
depositProceedButton.addEventListener('click', handleContinuePayment);

const payWithPaystack = (fundingForm) => {

    var handler = PaystackPop.setup({
        key: 'pk_test_4837d640a1bc74133a9eb9c33eb7fd7fd8f89c79', //put your public key here
        email: fundingForm.userEmail.value, //put your customer's email here
        amount: fundingForm.amount.value * 100, //amount the customer is supposed to pay in kobo
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
            // get payment reference
            fundingForm.fundingReference.value = response.reference;
            // submit funding form
            fundingForm.submit();
        },
        onClose: function () {
            //when the user close the payment modal
            alert('Transaction cancelled');
        }
    });
    handler.openIframe(); //open the paystack's payment modal
}