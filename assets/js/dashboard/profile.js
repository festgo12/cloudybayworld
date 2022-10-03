var getUrl = window.location;
// var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var baseUrl = getUrl.origin;

const tempAvatar = document.querySelector('#tempAvatar');
// get the current user profile picture
const profileAvatar = document.querySelector('#profileAvatar');
const profileCover = document.querySelector('.cardheader');
const avatarInput = document.querySelector('#avatarInput');
const coverInput = document.querySelector('#coverInput');
const saveButton = document.querySelector('#saveButton');

const waitSpinner = document.querySelector('#waitSpinner') || '';
const errorMessage = document.querySelector('#errorMessage') || '';
errorMessage ? errorMessage.style.display = 'none' : '';
const feedContainer = document.querySelector('#feedContainer');
// Get all the form input elements using a query selector
const postInput = document.querySelector('#postInput');
const fileInput = document.querySelector('#fileInput') || '';
const postButton = document.querySelector('#postButton') || '';
const userId = document.querySelector('#userId');
// get the current user profile picture
const realAvatar = document.querySelector('#realAvatar');
const usernameHolder = document.querySelector('#usernameHolder');
let commentInput = document.getElementsByClassName('commentInput');


// create formData object
const formData = new FormData();
let file;

const handleSelectImage = (event) => {
    file = event.target.files[0];
    // clear coverInput value
    coverInput.value = '';
    // display the uploaded image to tempAvatar element
    tempAvatar.src = URL.createObjectURL(file);
    tempAvatar.style.display = 'block';
    // append the post files to the form data
    formData.append('avatarInput', file, `Avatar-${userId.value}`)
}
const handleSelectCover = (event) => {
    file = event.target.files[0];
    // clear avatarInput value
    avatarInput.value = '';
    // display the uploaded image to tempAvatar element
    tempAvatar.src = URL.createObjectURL(file);
    tempAvatar.style.display = 'block';
    // append the post files to the form data
    formData.append('coverInput', file, `Cover-${userId.value}`)
}

const handleSaveAvatar = (event) => {
    event.preventDefault();
    // check if input is empty or not
    if(avatarInput.value || coverInput.value ){
        
        if(avatarInput.value){

            profileAvatar.src = URL.createObjectURL(file);
        }
        if(coverInput.value){
                link = URL.createObjectURL(file);
            profileCover.style.background = URL.createObjectURL(file);
            // profileCover.style.background = url(`${URL.createObjectURL(file)}`);
            console.log(link);

        }
        // send a post request to the server with the form data
        (async () => {
            const rawResponse = await fetch(`${baseUrl}/api/updateAvatar/${userId.value}`, {
                method: 'POST',
                body: formData
            });
            const content = await rawResponse.json();
            console.log(content);
            // clear form data
            formData.delete('avatarInput')
            formData.delete('coverInput')
        })();
    }

    return;
    }

/**
 * listen for saveButton Onclick event and call 
 * the 'handleSaveAvatar' function when clicked
 * */
saveButton.addEventListener('click', handleSaveAvatar);

 /**
  * listen for avatarInput onChange event and call 
  * the 'handleSelectImage' function when changed
  * */
avatarInput.addEventListener('change', handleSelectImage);
 /**
  * listen for coverInput onChange event and call 
  * the 'handleSelectImage' function when changed
  * */
coverInput.addEventListener('change', handleSelectCover);


const handleSelectImages = (event) => {
    let files = event.target.files;
    // append the post files to the form data
    [...files].map((file, i) => formData.append('fileInput[]', file, `fileInput${i}`));
    // formData.append('fileInput', files[0], 'fileInput');
}

const handleSavePost = (event) => {
    event.preventDefault();
    // do nothing if input is empty
    if(!postInput.value){
        return;
    }
    // show the spinner while the request is being processed
    waitSpinner.style.display = 'block';
    // append the post content to the form data
    formData.append('postInput', postInput.value);
    formData.append('postType', 'User');
    // send a post request to the server with the form data
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/feed/${userId.value}`, {
            method: 'POST',
            body: formData
        });
        const content = await rawResponse.json();
        if(content.error){
            errorMessage.style.display = 'block';
            errorMessage.innerHTML = `<strong class="text-danger">${content.message}</strong>`;
        }

        console.log(content);
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
 *  This function gets feeds tailored forna particular user
 */
 const loadFeeds = () => {
    // send a get request to the server to fetch feeds
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/profile-feeds/${usernameHolder.value}`, {
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
                            ${(feed.feedable_type == 'Shop') ? `
                                <a href="${baseUrl+'/market/'+feed.shop.slug}" class="col-sm-8">
                                    <div class="media"><img class="img-thumbnail rounded-circle me-3" src="${(feed.shop.attachments) ? './assets/uploads/' + feed.shop.attachments['path'] : './assets/images/avatar/default.jpg'}" alt="Generic placeholder image">
                                    <div class="media-body align-self-center">
                                        <h5 class="mt-0 user-name">${feed.shop.shopName}</h5>
                                    </div>
                                    </div>
                                </a>
                            ` : `
                                <a href="${baseUrl+'/profile/'+feed.user.username}" class="col-sm-8">
                                    <div class="media"><img class="img-thumbnail rounded-circle me-3" src="${(feed.user.attachments) ? './assets/uploads/' + feed.user.attachments['path'] : './assets/images/avatar/default.jpg'}" alt="Generic placeholder image">
                                    <div class="media-body align-self-center">
                                        <h5 class="mt-0 user-name">${feed.user.firstname + ' ' + feed.user.lastname}</h5>
                                    </div>
                                    </div>
                                </a>
                            `}

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
                                    <li class="list-inline-item  border-right pe-3">
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
                                    <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="${profileAvatar.src}">
                                    <div class="media-body">
                                        <div class="input-group text-box">
                                            <input postid="${feed.id}" id="emojionearea1" class="commentInput form-control input-txt-bx" type="text" name="message-to-send" placeholder="Post Your commnets">
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

/**
 * This function gets the number followers of the 
 * current user from the server
 */
const followersCount = () => {
    const followersCountEl = document.querySelector('#followersCountEl');
    // send a get request to the server
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/followers/${usernameHolder.value}`, {
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
const followingCount = () => {
    const followingCountEl = document.querySelector('#followingCountEl');
    // send a get request to the server
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/following/${usernameHolder.value}`, {
            method: 'GET',
        });
        const content = await rawResponse.json();
        followingCountEl.innerHTML = content;
    })();
}
followingCount();

/**
 * This function gets the number of 
 * persons the current user is following from the server
 */
 const isFollowingCheck = () => {
    const followButton = document.querySelector('#followButton');
    // send a get request to the server
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/isFollowing/${userId.value}/${usernameHolder.value}`, {
            method: 'GET',
        });
        const content = await rawResponse.json();
        if(content){
            followButton.innerHTML = 'Following';
            
        }else{
            followButton.innerHTML = 'Follow';
        }
    })();
}
isFollowingCheck();

const handleFollowUser = (username) => {
    // send a post request to the server with the form data
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/follow`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                userId: userId.value,
                followingUsername: username
            })
        });
        const content = await rawResponse.json();
        // re-render the following count
        followingCount();
        followersCount();
        // re-render the followButton
        isFollowingCheck();
    })();
}

const handlePostComment = (event) => {
    event.preventDefault();
    // make sure an enter key was pressed before processing
    if (event.keyCode === 13) {
        // make sure comment is not an empty string
        if(event.target.value){
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
