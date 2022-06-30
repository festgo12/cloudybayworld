var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

const waitSpinner = document.querySelector('#waitSpinner');
const feedContainer = document.querySelector('#feedContainer');
// Get all the form input elements using a query selector
const postInput = document.querySelector('#postInput');
const fileInput = document.querySelector('#fileInput');
const postButton = document.querySelector('#postButton');
const userId = document.querySelector('#userId');

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
    if(!postInput.value){
        return;
    }
    // show the spinner while the request is being processed
    waitSpinner.style.display = 'block';
    // append the post content to the form data
    formData.append('postInput', postInput.value);
    // send a post request to the server with the form data
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/feed/${userId.value}`, {
            method: 'POST',
            body: formData
        });
        const content = await rawResponse.json();
        // reset the input fields
        fileInput.value = '';
        postInput.value = '';
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
postButton.addEventListener('click', handleSavePost);

/**
 * listen for fileInput onChange event and call 
 * the 'handleSelectImages' function when changed
 * */
fileInput.addEventListener('change', handleSelectImages);


/**
 * This function sends a post request to 
 * the server to like a particular feed
 */
 const likeFeed = (feedId) => {
    // send a post request to the server with the form data
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/feed-like/${userId.value}/${feedId}`, {
            method: 'GET',
        });
        const content = await rawResponse.json();

        // re-render the feeds block
        loadFeeds();
    })();
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
        console.log(content);
        let feedBlocks = '';
        content.map(feed => {
            return feedBlocks += `
                <div class="col-sm-12 ">
                    <div class="card">
                        <div class="profile-img-style">
                            <div class="post-border">
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
                                        <label onclick="likeFeed(${feed.id})" class="m-0"><a ${(feed.is_liked_by.length > 0) ? 'style="color: #dc3545;"' : ''}><i class="fa fa-heart"></i></a>  Like</label><span class="ms-2 counter">${feed.likes.length}</span>
                                    </li>
                                    <li class="list-inline-item ms-2">
                                        <label class="m-0"><a href="#"><i class="fa fa-comment"></i></a>  Comment</label><span class="ms-2 counter">569</span>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            
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