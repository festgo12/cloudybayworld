
<base href="../">
@extends('layouts.app')

@section('title')
Create New Shop
@endsection

@section('style')
@endsection

@section('content')
 

<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>
                   Shop Setup</h3>
              </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">                                       <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active">Shop Setup</li>
            </ol>
          </div>
        </div>
      </div>
    </div>


    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
              

               <form class="container" name="createShopForm">
                    <div class="avatar d-flex justify-content-center mt-2 mb-3">
                        <img id="tempAvatar" style="display:block" height="200" width="200" alt="" src="./assets/images/avatar/default.jpg">
                    </div>
                    <center class="mb-3">
                        <label>
                            <span class="btn btn-primary">Upload Image <span class="text-danger">*</span></span> 
                            <input id="avatarInput" hidden class="mb-4 form-control btn form-control-sm" id="formFileSm" type="file">
                        </label>
                    </center>
                    
                    <div class="form-row row mb-3">
                        <div class="form-group col-md-6">
                            <label for="shopName">Shop Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="shopName" placeholder="Shop Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="shopOwner">Owner <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="shopOwner" value="{{ Auth::user()->username }}" disabled placeholder="Owner Username">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="description" placeholder="Description">
                    </div>
                    <div class="form-row row mb-3">
                        <div class="form-group col-md-6">
                            <label for="founder">Founder/ Cofounder <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="founder" placeholder="Founder/ cofounder">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="businessType">Business Type <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="businessType" placeholder="Business Type">
                        </div>
                    </div>
                    <div class="form-row row mb-3">
                        <div class="form-group col-md-6">
                            <label for="yearFounded">Year Founded <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="yearFounded" placeholder="Year founded">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="numberOfBranch">No of Branches <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="numberOfBranch" placeholder="No of branches">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="location">Business Locations <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="location" placeholder="Locations">
                    </div>
                    <div class="form-row row mb-3">
                        <div class="form-group col-md-6">
                            <label for="productCategory">Product Category <span class="text-danger">*</span></label>
                            <select type="text" class="form-control" id="productCategory" name="productCategory" placeholder="Product category">
                                <option disabled selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="majorProduct">Major Products <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="majorProduct" placeholder="Major Products">
                        </div>
                    </div>
                    <div class="form-row row mb-3">
                        <div class="form-group col-md-6">
                            <label for="minorProduct">Minor Products <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="minorProduct" placeholder="Minor Products">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="targetCustomer">Target Customers <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="targetCustomer" placeholder="Target Customers">
                        </div>
                    </div>
                    <div class="form-row row mb-3">
                        <div class="form-group col-md-6">
                            <label for="contactNo">Contact Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="contactNo" placeholder="Contact No.">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contactEmail">Contact Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="contactEmail" placeholder="Contact Email Address">
                        </div>
                    </div>
                    <div class="form-row row mb-3">
                        <div class="form-group col-md-6">
                            <label for="websiteLink">Website <span class="text-danger">*</span></label>
                            <input type="url" class="form-control" name="websiteLink" placeholder="Website">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="facebookLink">Facebook <span class="text-danger">*</span></label>
                            <input type="url" class="form-control" name="facebookLink" placeholder="Facebook">
                        </div>
                    </div>
                    <div class="form-row row mb-3" >
                        <div class="form-group col-md-6">
                            <label for="twitterLink">Twitter <span class="text-danger">*</span></label>
                            <input type="url" class="form-control" name="twitterLink" placeholder="Twitter">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="linkedinLink">Linkedln <span class="text-danger">*</span></label>
                            <input type="url" class="form-control" name="linkedinLink" placeholder="Linkedln">
                        </div>
                    </div>
                    <div class="form-row row mb-3">
                        <div class="form-group col-md-6">
                            <label for="timeOfOperation">Hours of Operation <span class="text-danger">*</span></label>
                            <select name="timeOfOperation" class="form-control">
                                <option disabled selected>Choose...</option>
                                <option value="Weekly">Weekly</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="startTime">Open Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="startTime">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="closeTime">Close Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="closeTime">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            
                          <div class="text-end ">
                            <p id="errorMessage" class="text-center">Message</p>
                            
                            @if (Auth::user()->shop == null)
                            
                            <button id="saveButton" type="submit" class="btn btn-primary mt-3">Create Shop</button>
                            @else
                            <p id="" class="text-center">Already Create a Shop</p>
                            
                            @endif
                            
                            </div>
                        </div>
                      </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>



</div>
</div>
@endsection

@section('script')

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
    <script>
        var baseUrl = document.querySelector('meta[name=base]').content;

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
                        // console.log(content);

                        errorMessage.style.display = 'block';

                        if(content.error){
                            errorMessage.innerHTML = `<strong class="text-danger">${content.message}</strong>`;
                        }else{
                            errorMessage.innerHTML = `<strong class="text-success">${content.message}</strong>`;
                            if(confirm(content.message)){window.location.reload(mainurl)}
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

@endsection