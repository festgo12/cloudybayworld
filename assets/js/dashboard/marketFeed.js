var baseUrl = document.querySelector('meta[name=base]').content;

const waitSpinner = document.querySelector('#waitSpinner') || '';
const errorMessage = document.querySelector('#errorMessage') || '';
errorMessage ? errorMessage.style.display = 'none' : '';
const feedContainer = document.querySelector('#feedContainer');
// Get all the form input elements using a query selector
const postInput = document.querySelector('#postInput');
const fileInput = document.querySelector('#fileInput') || '';
const postButton = document.querySelector('#postButton') || '';
const userId = document.querySelector('#userId');
const shopId = document.querySelector('#shopId');
const shopSlug = document.querySelector('#shopSlug');
// get the current user profile picture
const realAvatar = document.querySelector('#realAvatar');
let commentInput = document.getElementsByClassName('commentInput');


// create formData object
const formData = new FormData();

const handleSelectImages = (event) => {
    let files = event.target.files;
    // append the post files to the form data
    [...files].map((file, i) => formData.append('fileInput[]', file, `fileInput${i}`));
    // formData.append('fileInput', files[0], 'fileInput');
}

const handleSavePost = (event) => {
    event.preventDefault();
    // do nothing if input is empty
    if (!postInput.value) {
        return;
    }
    // show the spinner while the request is being processed
    waitSpinner.style.display = 'block';
    // append the post content to the form data
    formData.append('postInput', postInput.value);
    formData.append('postType', 'Shop');
    // send a post request to the server with the form data
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/feed/${shopId.value}`, {
            method: 'POST',
            body: formData
        });
        const content = await rawResponse.json();
        if (content.error) {
            errorMessage.style.display = 'block';
            errorMessage.innerHTML = `<strong class="text-danger">${content.message}</strong>`;
        }
        // reset the input fields
        fileInput.value = '';
        postInput.value = '';
        formData.delete('fileInput[]')
        // re-render the feeds block
        loadFeeds();
        // hide the spinner after processing the request
        waitSpinner.style.display = 'none';
    })();
}
/**
 * listen for postButton Onclick event and call 
 * the 'handlePost' function when clicked
 * */
postButton ? postButton.addEventListener('click', handleSavePost) : '';

/**
 * listen for fileInput onChange event and call 
 * the 'handleSelectImages' function when changed
 * */
fileInput ? fileInput.addEventListener('change', handleSelectImages) : '';


/**
 * This function sends a post request to 
 * the server to like a particular feed
 */
const likeFeed = (feedId) => {
    // send a post request to the server with the form data
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/feed-like`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                userId: userId.value,
                feedId: feedId
            })
        });
        const content = await rawResponse.json();

        // re-render the feeds block 
        loadFeeds();
    })();
}

/**
 * This functions show/hide the comment section 
 * for each post/feed
 */
const toggleComment = (feedId) => {
    const commentBox = document.querySelector(`#commentBox-${feedId}`);
    commentBox.classList.toggle("d-none");
    const commentList = document.querySelector(`#commentList-${feedId}`);
    commentList.classList.toggle("d-none");

    /**
     * add keyboard enter event listener for all comment inputs,
     * call a function that sends a POST request 
     * if a comment has been entered.
     */
    ([...commentInput].forEach(el => el.addEventListener('keyup', handlePostComment)));
}

/**
 * This function formats date properly
 * similar to diffForHumans() function in Laravel
 */
const getTimeAgo = (date) => {
    const MINUTE = 60,
        HOUR = MINUTE * 60,
        DAY = HOUR * 24,
        WEEK = DAY * 7,
        MONTH = DAY * 30,
        YEAR = DAY * 365

    const secondsAgo = Math.round((+new Date() - date) / 1000)
    let divisor = null
    let unit = null

    if (secondsAgo < MINUTE) {
        return secondsAgo + " seconds ago"
    } else if (secondsAgo < HOUR) {
        [divisor, unit] = [MINUTE, 'minute']
    } else if (secondsAgo < DAY) {
        [divisor, unit] = [HOUR, 'hour']
    } else if (secondsAgo < WEEK) {
        [divisor, unit] = [DAY, 'day']
    } else if (secondsAgo < MONTH) {
        [divisor, unit] = [WEEK, 'week']
    } else if (secondsAgo < YEAR) {
        [divisor, unit] = [MONTH, 'month']
    } else if (secondsAgo > YEAR) {
        [divisor, unit] = [YEAR, 'year']
    }

    count = Math.floor(secondsAgo / divisor)
    return `${count} ${unit}${(count > 1) ? 's' : ''} ago`
}


/**
 *  This function gets feeds tailored for a particular user
 */
const loadFeeds = () => {
    // send a get request to the server to fetch feeds
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/shop-feeds/${userId.value}/${shopSlug.value}`, {
            method: 'GET',
        });
        const content = await rawResponse.json();
        let feedBlocks = '';
        content.map(feed => {
            return feedBlocks += `
                <div class="col-sm-12">
                    <div class="card">
                        <div class="profile-img-style">
                            <div class="post-border p-2">
                            <div class="row">
                            <a href="${baseUrl + '/market/' + feed.shop.slug}" class="col-sm-8">
                                <div class="media"><img class="img-thumbnail rounded-circle me-3" src="${(feed.shop.attachments) ? './assets/uploads/' + feed.shop.attachments['path'] : './assets/images/avatar/default.jpg'}" alt="Generic placeholder image">
                                <div class="media-body align-self-center">
                                    <h5 class="mt-0 user-name">${feed.shop.shopName}</h5>
                                </div>
                                </div>
                            </a>
                            <div class="col-sm-4 align-self-center">
                                <div class="float-sm-end"><small>${getTimeAgo(new Date(feed.created_at))}</small></div>
                            </div>
                            </div>
                            <hr>

                            ${feed.attachments ? (
                    (feed.attachments.length > 1) ? (
                        `<div class="row mt-4 pictures my-gallery" id="aniimated-thumbnials-2" itemscope="">
                                            <figure class="col-sm-6" itemprop="associatedMedia" itemscope="">
                                                <a href="./assets/uploads/${feed.attachments[0]['path']}" itemprop="contentUrl" data-size="1600x950">
                                                ${(feed.attachments[0]['type'] == 'image') ? `
                                                    <img class="img-fluid rounded" src="./assets/uploads/${feed.attachments[0]['path']}" itemprop="thumbnail" alt="gallery">
                                                ` : `
                                                    <video class="img-fluid rounded" itemprop="thumbnail" controls>
                                                        <source src="./assets/uploads/${feed.attachments[0]['path']}" type="video/mp4">
                                                    </video>
                                                ` }
                                                </a>
                                            </figure>
                                            <figure class="col-sm-6" itemprop="associatedMedia" itemscope="">
                                                <a href="./assets/uploads/${feed.attachments[1]['path']}" itemprop="contentUrl" data-size="1600x950">
                                                ${(feed.attachments[1]['type'] == 'image') ? `
                                                    <img class="img-fluid rounded" src="./assets/uploads/${feed.attachments[1]['path']}" itemprop="thumbnail" alt="gallery">
                                                ` : `
                                                    <video class="img-fluid rounded" itemprop="thumbnail" controls>
                                                        <source src="./assets/uploads/${feed.attachments[1]['path']}" type="video/mp4">
                                                    </video>
                                                ` }
                                                </a>
                                            </figure>
                                        </div>`
                    ) : (
                        `<div class="img-container">
                                            <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                                                <figure itemprop="associatedMedia" itemscope="">
                                                    <a href="./assets/uploads/${feed.attachments[0]['path']}" itemprop="contentUrl" data-size="1600x950">
                                                    ${(feed.attachments[0]['type'] == 'image') ? `
                                                        <img class="img-fluid rounded" src="./assets/uploads/${feed.attachments[0]['path']}" itemprop="thumbnail" alt="gallery">
                                                    ` : `
                                                        <video class="img-fluid rounded" itemprop="thumbnail" controls>
                                                            <source src="./assets/uploads/${feed.attachments[0]['path']}" type="video/mp4">
                                                        </video>
                                                    ` }                                                            
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>`
                    )
                ) : (
                    ''
                )
                }
                            <p>${feed.content}</p>
                            
                            <div class="like-comment">
                                <ul class="list-inline">
                                    <li class="list-inline-item border-right pe-3">
                                        <label onclick="likeFeed(${feed.id})" class="m-0 btn"><a ${(feed.is_liked_by.length > 0) ? 'style="color: #dc3545;"' : ''}><i class="fa fa-heart"></i></a>  Like</label>
                                        <span class="ms-2 counter">${feed.likes.length}</span>
                                    </li>
                                    <li class="list-inline-item ms-2">
                                        <label onclick="toggleComment(${feed.id})" class="m-0 btn p-0"><a href="#"><i class="fa fa-comment"></i></a>  Comment</label>
                                        <span class="ms-2 counter">${feed.total_comments}</span>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div id="commentList-${feed.id}" class="social-chat d-none">
                                ${
                // if comment exist show the block below
                (feed.total_comments) ? (feed.comments.slice(0, 2).map(comment => `
                                        <div class="your-msg">
                                            <div class="media">
                                                <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="${(comment.user.attachments) ? './assets/uploads/' + comment.user.attachments['path'] : './assets/images/avatar/default.jpg'}">
                                                <div class="media-body"><span class="f-w-600">${comment.user.firstname + ' ' + comment.user.lastname} <span>${getTimeAgo(new Date(comment.created_at))} <i class="fa fa-reply font-primary"></i></span></span>
                                                    <p>${comment.content}</p>
                                                </div>
                                            </div>
                                        </div>
                                    `)) : ''
                }
                                ${(feed.total_comments > 2) ? `<div class="text-center"><a href="javascript:loadMoreComments(${feed.id});">More Commnets</a></div>` : ''}
                            </div>
                            <div id="commentBox-${feed.id}" class="comments-box d-none">
                                <div class="media">
                                    <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="${realAvatar.src}">
                                    <div class="media-body">
                                        <div class="input-group text-box">
                                            <input postid="${feed.id}" class="commentInput form-control input-txt-bx" type="text" name="message-to-send" placeholder="Post Your commnets">
                                            <div class="input-group-append">
                                                <button class="btn btn-transparent" type="button"><i class="fa fa-smile-o"> </i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        </div>
                    </div>
                </div>
                `;
        });

        // append the loaded content to the page
        feedContainer.innerHTML = feedBlocks;
        waitSpinner.style.display = 'none';
    })();
}
loadFeeds();

const handlePostComment = (event) => {
    event.preventDefault();
    // make sure an enter key was pressed before processing
    if (event.keyCode === 13) {
        // make sure comment is not an empty string
        if (event.target.value) {
            const feedId = event.target.attributes.postid.value;
            // send a post request to the server with the form data
            (async () => {
                const rawResponse = await fetch(`${baseUrl}/api/comment`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        userId: userId.value,
                        feedId: feedId,
                        content: event.target.value
                    })
                });
                const content = await rawResponse.json();
                event.target.value = '';
                // add the new comment to the comment block
                const commentList = document.querySelector(`#commentList-${feedId}`);
                const newComment = `
                <div class="your-msg">
                    <div class="media">
                        <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="${(content.data.user.attachments) ? './assets/uploads/' + content.data.user.attachments['path'] : './assets/images/avatar/default.jpg'}">
                        <div class="media-body"><span class="f-w-600">${content.data.user.firstname + ' ' + content.data.user.lastname} <span>${getTimeAgo(new Date(content.data.created_at))} <i class="fa fa-reply font-primary"></i></span></span>
                            <p>${content.data.content}</p>
                        </div>
                    </div>
                </div>`;
                commentList.insertAdjacentHTML('afterbegin', newComment);
            })();
        }
    }
}

const loadMoreComments = (feedId) => {
    // send a get request to the server
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/comment/${feedId}`, {
            method: 'GET',
        });
        const content = await rawResponse.json();
        // add the new comment to the comment block
        const commentList = document.querySelector(`#commentList-${feedId}`);
        // map through the comments and fill the comment block of the particular feed
        let commentContents = '';
        content.data.map(comment => {
            commentContents += `
                <div class="your-msg">
                    <div class="media">
                        <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="${(comment.user.attachments) ? './assets/uploads/' + comment.user.attachments['path'] : './assets/images/avatar/default.jpg'}">
                        <div class="media-body"><span class="f-w-600">${comment.user.firstname + ' ' + comment.user.lastname} <span>${getTimeAgo(new Date(comment.created_at))} <i class="fa fa-reply font-primary"></i></span></span>
                            <p>${comment.content}</p>
                        </div>
                    </div>
                </div>
                `
        });
        commentList.innerHTML = commentContents;
    })();
}

/**
 * This function gets the number followers of the 
 * current shop from the server
 */
const followersCount = () => {
    const followersCountEl = document.querySelector('#followersCountEl');
    // send a get request to the server
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/shopFollowers/${shopSlug.value}`, {
            method: 'GET',
        });
        const content = await rawResponse.json();
        followersCountEl.innerHTML = content;
    })();
}
followersCount();

/**
 * This function gets the number of 
 * persons the current user is following from the server
 */
const isFollowingCheck = () => {
    const followButton = document.querySelector('#followButton');
    // send a get request to the server
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/isFollowingShop/${shopSlug.value}/${userId.value}`, {
            method: 'GET',
        });
        const content = await rawResponse.json();
        if (content) {
            followButton.innerHTML = 'Following';
        } else {
            followButton.innerHTML = 'Follow';
        }
    })();
}
isFollowingCheck();

const handleFollowShop = () => {
    // send a post request to the server with the form data
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/followShop`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                userId: userId.value,
                shopSlug: shopSlug.value
            })
        });
        const content = await rawResponse.json();
        // console.log(content);
        // console.log(userId.value);
        // console.log(shopSlug.value);
        // console.log(shopId.value);

        // document.body.innerHTML = content
        // re-render the following count
        followersCount();
        // re-render the followButton
        isFollowingCheck();
    })();
}

/**
 * This function checks if current user favorited 
 * the current shop
 */
 const isFavoritedCheck = () => {
    const favoriteButton = document.querySelector('#favoriteButton');
    // send a get request to the server
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/isFavorited/${shopSlug.value}/${userId.value}`, {
            method: 'GET',
        });
        const content = await rawResponse.json();
        // console.log(content);
        if (content) {
            favoriteButton.innerHTML = `<i class="fa fa-star"></i> Favourited`;
            favoriteButton.classList.remove('font-primary');
            favoriteButton.classList.add('font-warning');
        } else {
            favoriteButton.innerHTML = `<i class="fa fa-star"></i> Favourite`;
            favoriteButton.classList.remove('font-warning');
            favoriteButton.classList.add('font-primary');
        }
    })();
}

isFavoritedCheck();

const handleFavoriteShop = () => {
    // send a post request to the server with the form data

    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/favoriteShop`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                userId: userId.value,
                shopSlug: shopSlug.value
            })
        });
        const content = await rawResponse.json();
        // console.log(content);

        // re-render the favoriteButton
        isFavoritedCheck();
    })();
}


$(document).on('submit','#geniusform',function(e){
    e.preventDefault();

    var fd = new FormData(this);

    if ($('.attr-checkbox').length > 0) {
       $('.attr-checkbox').each(function() {

          // if checkbox checked then take the value of corresponsig price input (if price input exists)
          if($(this).prop('checked') == true) {

          if ($("#"+$(this).attr('id')+'_price').val().length > 0) {
             // if price value is given
             fd.append($("#"+$(this).attr('id')+'_price').data('name'), $("#"+$(this).attr('id')+'_price').val());
          } else {
             // if price value is not given then take 0
             fd.append($("#"+$(this).attr('id')+'_price').data('name'), 0.00);
          }

          // $("#"+$(this).attr('id')+'_price').val(0.00);
          }
       });
    }

    var geniusform = $(this);
    $('button.addProductSubmit-btn').prop('disabled',true);
       $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data:fd,
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
          console.log(data);
          if ((data.errors)) {
          geniusform.parent().find('.alert-success').hide();
          geniusform.parent().find('.alert-danger').show();
          geniusform.parent().find('.alert-danger ul').html('');
             for(var error in data.errors)
             {
                $('.alert-danger ul').append('<li>'+ data.errors[error] +'</li>')
             }
             geniusform.find('input , select , textarea').eq(1).focus();
          }
          else
          {
             geniusform.parent().find('.alert-danger').hide();
             geniusform.parent().find('.alert-success').show();
             geniusform.parent().find('.alert-success p').html(data);
             geniusform.find('input , select , textarea').eq(1).focus();
          }

          $('button.addProductSubmit-btn').prop('disabled',false);


          $(window).scrollTop(0);
          // reset form
          $('#geniusform')[0].reset();

       },
       error: function(error){
          console.log(error);
       }

       });

    });

    $('#blog-image-upload').on('change', (e) => {
       document.querySelector('#blog-image-preview').style.backgroundImage = `url('${URL.createObjectURL(e.target.files[0])}')`;
    });