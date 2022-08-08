<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Create New Shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="p-4">
    
    <form class="container" name="createShopForm">
        <div class="avatar d-flex justify-content-center mt-2">
            <img id="tempAvatar" style="display:block" height="200" width="200" alt="" src="./assets/images/avatar/default.jpg">
        </div>
        <input id="avatarInput" class="mb-4 form-control form-control-sm" id="formFileSm" type="file">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="shopName">Shop Name</label>
                <input type="text" class="form-control" name="shopName" placeholder="Shop Name">
            </div>
            <div class="form-group col-md-6">
                <label for="shopOwner">Owner</label>
                <input type="text" class="form-control" name="shopOwner" placeholder="Owner Username">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Description">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="founder">Founder/ cofounder</label>
                <input type="text" class="form-control" name="founder" placeholder="Founder/ cofounder">
            </div>
            <div class="form-group col-md-6">
                <label for="businessType">Business Type</label>
                <input type="text" class="form-control" name="businessType" placeholder="Business Type">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="yearFounded">Year founded</label>
                <input type="number" class="form-control" name="yearFounded" placeholder="Year founded">
            </div>
            <div class="form-group col-md-6">
                <label for="numberOfBranch">No of branches</label>
                <input type="number" class="form-control" name="numberOfBranch" placeholder="No of branches">
            </div>
        </div>
        <div class="form-group">
            <label for="location">Business Locations</label>
            <input type="text" class="form-control" name="location" placeholder="Locations">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="productCategory">Product category</label>
                <select type="text" class="form-control" id="productCategory" name="productCategory" placeholder="Product category">
                    <option disabled selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="majorProduct">Major Products</label>
                <input type="text" class="form-control" name="majorProduct" placeholder="Major Products">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="minorProduct">Minor Products</label>
                <input type="text" class="form-control" name="minorProduct" placeholder="Minor Products">
            </div>
            <div class="form-group col-md-6">
                <label for="targetCustomer">Target Customers</label>
                <input type="text" class="form-control" name="targetCustomer" placeholder="Target Customers">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="contactNo">Contact No.</label>
                <input type="text" class="form-control" name="contactNo" placeholder="Contact No.">
            </div>
            <div class="form-group col-md-6">
                <label for="contactEmail">Contact Email Address</label>
                <input type="email" class="form-control" name="contactEmail" placeholder="Contact Email Address">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="websiteLink">Website</label>
                <input type="url" class="form-control" name="websiteLink" placeholder="Website">
            </div>
            <div class="form-group col-md-6">
                <label for="facebookLink">Facebook</label>
                <input type="url" class="form-control" name="facebookLink" placeholder="Facebook">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="twitterLink">Twitter</label>
                <input type="url" class="form-control" name="twitterLink" placeholder="Twitter">
            </div>
            <div class="form-group col-md-6">
                <label for="linkedinLink">Linkedln</label>
                <input type="url" class="form-control" name="linkedinLink" placeholder="Linkedln">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="timeOfOperation">Hours of Operation</label>
                <select name="timeOfOperation" class="form-control">
                    <option disabled selected>Choose...</option>
                    <option value="Weekly">Weekly</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="startTime">Open Time</label>
                <input type="time" class="form-control" name="startTime">
            </div>
            <div class="form-group col-md-3">
                <label for="closeTime">Close Time</label>
                <input type="time" class="form-control" name="closeTime">
            </div>
        </div>
        <p id="errorMessage" class="text-center">Message</p>
        <button id="saveButton" type="submit" class="btn btn-primary">Create</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        const tempAvatar = document.querySelector('#tempAvatar');
        const avatarInput = document.querySelector('#avatarInput');
        const saveButton = document.querySelector('#saveButton');
        const errorMessage = document.querySelector('#errorMessage');
        errorMessage.style.display = 'none';

        // create formData object
        const formData = new FormData();

        const handleSelectImage = (event) => {
            file = event.target.files[0];
            // display the uploaded image to tempAvatar element
            tempAvatar.src = URL.createObjectURL(file);
            tempAvatar.style.display = 'block';
            // append the post files to the form data
            formData.append('avatarInput', file, `Shop-Avatar`)
        }

        /**
         * listen for avatarInput onChange event and call 
         * the 'handleSelectImages' function when changed
         * */
        avatarInput.addEventListener('change', handleSelectImage);

        const handleSaveData = (event) => {
            event.preventDefault();
            // do nothing if input is empty
            if(!avatarInput.value){
                return;
            }
            // form object
            const createShopForm = document.forms.createShopForm;
            formData.append('shopName', createShopForm.shopName.value);
            formData.append('description', createShopForm.description.value);
            formData.append('founder', createShopForm.founder.value);
            formData.append('businessType', createShopForm.businessType.value);
            formData.append('yearFounded', createShopForm.yearFounded.value);
            formData.append('numberOfBranch', createShopForm.numberOfBranch.value);
            formData.append('location', createShopForm.location.value);
            formData.append('category_id', createShopForm.productCategory.value);
            formData.append('majorProduct', createShopForm.majorProduct.value);
            formData.append('minorProduct', createShopForm.minorProduct.value);
            formData.append('targetCustomer', createShopForm.targetCustomer.value);
            formData.append('contactNo', createShopForm.contactNo.value);
            formData.append('contactEmail', createShopForm.contactEmail.value);
            formData.append('websiteLink', createShopForm.websiteLink.value);
            formData.append('facebookLink', createShopForm.facebookLink.value);
            formData.append('twitterLink', createShopForm.twitterLink.value);
            formData.append('linkedinLink', createShopForm.linkedinLink.value);
            formData.append('timeOfOperation', createShopForm.timeOfOperation.value);
            formData.append('startTime', createShopForm.startTime.value);
            formData.append('closeTime', createShopForm.closeTime.value);

            // check if the username in owner input exists
            // send a get request to the server
            (async () => {
                const rawResponse = await fetch(`${baseUrl}/api/profileByUsername/${createShopForm.shopOwner.value}`, {
                    method: 'GET',
                });
                const content = await rawResponse.json();

                if(content){
                    formData.append('user_id', content.id);
                    // send a post request to the server with the form data
                    (async () => {
                        const rawResponse = await fetch(`${baseUrl}/api/createShop`, {
                            method: 'POST',
                            body: formData
                        });
                        const content = await rawResponse.json();
                        console.log(content);
                        errorMessage.style.display = 'block';
                        if(content.error){
                            errorMessage.innerHTML = `<strong class="text-danger">${content.message}</strong>`;
                        }else{
                            errorMessage.innerHTML = `<strong class="text-success">${content.message}</strong>`;
                            if(confirm(content.message)){window.location.reload()}
                        }
                    })();
                }else{
                    alert("Invalid Username!");
                    return 0;
                }
            })();
        }

        /**
         * listen for saveButton Onclick event and call 
         * the 'handleSaveData' function when clicked
         * */
        saveButton.addEventListener('click', handleSaveData);

        const getShopCategories = () => {
            // send a get request to the server
            (async () => {
                const rawResponse = await fetch(`${baseUrl}/api/shopCategories`, {
                    method: 'GET',
                });
                const content = await rawResponse.json();
                // add the fetched categories to the Product category input
                const productCategory = document.querySelector(`#productCategory`);
                // map through the categories
                let categories = '<option value="" disabled selected>Select Category</option>';
                content.map(category => {
                    categories += `<option value="${category.id}">${category.category_name}</option>`;
                });
                productCategory.innerHTML = categories;
            })();
        }
        getShopCategories();
    </script>
</body>
</html>