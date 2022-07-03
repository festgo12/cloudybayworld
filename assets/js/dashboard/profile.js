var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

const tempAvatar = document.querySelector('#tempAvatar');
// get the current user profile picture
const realAvatar = document.querySelector('#realAvatar');
const avatarInput = document.querySelector('#avatarInput');
const saveButton = document.querySelector('#saveButton');

const feedContainer = document.querySelector('#feedContainer');
const userId = document.querySelector('#userId');
const usernameHolder = document.querySelector('#usernameHolder');


// create formData object
const formData = new FormData();
let file;

const handleSelectImage = (event) => {
    file = event.target.files[0];
    // display the uploaded image to tempAvatar element
    tempAvatar.src = URL.createObjectURL(file);
    tempAvatar.style.display = 'block';
    // append the post files to the form data
    formData.append('avatarInput', file, `Avatar-${userId.value}`)
}

const handleSaveAvatar = (event) => {
    event.preventDefault();
    // do nothing if input is empty
    if(!avatarInput.value){
        return;
    }
    realAvatar.src = URL.createObjectURL(file);
    // send a post request to the server with the form data
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/updateAvatar/${userId.value}`, {
            method: 'POST',
            body: formData
        });
        const content = await rawResponse.json();
        console.log(content);
    })();
}

/**
 * listen for saveButton Onclick event and call 
 * the 'handleSaveAvatar' function when clicked
 * */
saveButton.addEventListener('click', handleSaveAvatar);

 /**
  * listen for avatarInput onChange event and call 
  * the 'handleSelectImages' function when changed
  * */
avatarInput.addEventListener('change', handleSelectImage);


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
        const rawResponse = await fetch(`${baseUrl}/api/feeds/${userId.value}`, {
            method: 'GET',
        });
        const content = await rawResponse.json();
        let feedBlocks = '';
        content.map(feed => {
            return feedBlocks += `
                <div class="col-sm-12 ">
                    <div class="card">
                        <div class="profile-img-style">
                            <div class="post-border p-2">
                            <div class="row">
                            <div class="col-sm-8">
                                <div class="media"><img class="img-thumbnail rounded-circle me-3" src="${(feed.user.attachments) ? './assets/uploads/' + feed.user.attachments['path'] : './assets/images/avatar/default.jpg'}" alt="Generic placeholder image">
                                <div class="media-body align-self-center">
                                    <h5 class="mt-0 user-name">${feed.user.firstname + ' ' + feed.user.lastname}</h5>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-4 align-self-center">
                                <div class="float-sm-end"><small>${getTimeAgo(new Date(feed.created_at))}</small></div>
                            </div>
                            </div>
                            <hr>

                            ${feed.attachments ? (
                    (feed.attachments.length > 1) ? (
                        `<div class="row mt-4 pictures my-gallery" id="aniimated-thumbnials-2" itemscope="">
                                            <figure class="col-sm-6" itemprop="associatedMedia" itemscope=""><a href="./assets/uploads/${feed.attachments[0]['path']}" itemprop="contentUrl" data-size="1600x950"><img class="img-fluid rounded" src="./assets/uploads/${feed.attachments[0]['path']}" itemprop="thumbnail" alt="gallery"></a>
                                            </figure>
                                            <figure class="col-sm-6" itemprop="associatedMedia" itemscope=""><a href="./assets/uploads/${feed.attachments[1]['path']}" itemprop="contentUrl" data-size="1600x950"><img class="img-fluid rounded" src="./assets/uploads/${feed.attachments[1]['path']}" itemprop="thumbnail" alt="gallery"></a>
                                            </figure>
                                        </div>`
                    ) : (
                        `<div class="img-container">
                                            <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                                                <figure itemprop="associatedMedia" itemscope=""><a href="./assets/uploads/${feed.attachments[0]['path']}" itemprop="contentUrl" data-size="1600x950"><img class="img-fluid rounded" src="./assets/uploads/${feed.attachments[0]['path']}" itemprop="thumbnail" alt="gallery"></a>
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
                                        <label onclick="likeFeed(${feed.id})" class="m-0"><a ${(feed.is_liked_by.length > 0) ? 'style="color: #dc3545;"' : ''}><i class="fa fa-heart"></i></a>  Like</label>
                                        <span class="ms-2 counter">${feed.likes.length}</span>
                                    </li>
                                    <li class="list-inline-item ms-2">
                                        <label onclick="toggleComment(${feed.id})" class="m-0 btn p-0"><a href="#"><i class="fa fa-comment"></i></a>  Comment</label>
                                        <span class="ms-2 counter">${feed.total_comments}</span>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div id="commentBox-${feed.id}" class="comments-box d-none">
                                <div class="media">
                                    <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="${realAvatar.src}">
                                    <div class="media-body">
                                        <div class="input-group text-box">
                                            <input class="form-control input-txt-bx" type="text" name="message-to-send" placeholder="Post Your commnets">
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
 * This function gets the number of the 
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
                followerUsername: username
            })
        });
        const content = await rawResponse.json();
        console.log(content);
        // re-render the following count
        followingCount();
        // re-render the followButton
        isFollowingCheck();
    })();
}
