var baseUrl = document.querySelector('meta[name=base]').content;

const userId = document.querySelector('#userId');
// get the current user profile picture
const realAvatar = document.querySelector('#realAvatar');
const waitSpinner = document.querySelector('#waitSpinner') || '';
const feedContainer = document.querySelector('#feedContainer');
let commentInput = document.getElementsByClassName('commentInput');
// user-tab button 
const userTabBtn = document.querySelector('#people-link');

// get search query paramaters
const params = new Proxy(new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop),
});
let query = params.q || 0; // "some_value"

// open user tab if search query starts with @
var tabTrigger = new bootstrap.Tab(userTabBtn)
if (query.startsWith('@')) {
    tabTrigger.show();
}

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
 *  This function gets feeds based on the searched term
 */
const loadFeeds = () => {
    // send a get request to the server to fetch feeds
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/search-feeds/${query}/${userId.value}`, {
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
                                <a href="${baseUrl + '/market/' + feed.shop.slug}" class="col-sm-8">
                                    <div class="media">
                                        <img style="width: 50px;" class="img-thumbnail rounded-circle me-3" src="${(feed.shop.attachments) ? './assets/uploads/' + feed.shop.attachments['path'] : './assets/images/avatar/default.jpg'}" alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h5 class="mt-0 user-name">${feed.shop.shopName}</h5>
                                        </div>
                                    </div>
                                </a>
                            ` : `
                                <a href="${baseUrl + '/profile/' + feed.user.username}" class="col-sm-8">
                                    <div class="media">
                                        <img style="width: 50px;" class="img-thumbnail rounded-circle me-3" src="${(feed.user.attachments) ? './assets/uploads/' + feed.user.attachments['path'] : './assets/images/avatar/default.jpg'}" alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h5 class="mt-0 user-name text-dark">${feed.user.firstname + ' ' + feed.user.lastname}</h5>
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
                                                <imgclass="img-fluid rounded" src="./assets/uploads/${feed.attachments[0]['path']}" itemprop="thumbnail" alt="gallery">
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

const handleFollowUser = (element, username) => {
    console.log(element.innerText, username);
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
        // re-render the followButton
        if(element.innerText == 'Follow'){
            element.innerText = 'Following';
        }else{
            element.innerText = 'Follow';
        }
    })();
}