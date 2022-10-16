var getUrl = window.location;
// var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var baseUrl = getUrl.origin;

const photosContainer = document.querySelector('#photosContainer');
const videoContainer = document.querySelector('#videoContainer');
const userId = document.querySelector('#userId');
const shopId = document.querySelector('#shopId');
const shopSlug = document.querySelector('#shopSlug');

/**
 *  This function gets feeds tailored forna particular user
 */
 const loadMedia = () => {
    // send a get request to the server to fetch feeds
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/shop-feeds/${userId.value}/${shopSlug.value}`, {
        });
        const content = await rawResponse.json();
        let photosBlock = '';
        let videosBlock = '';
        content.map(feed => {
            // check if feed has a media content
            if(feed.attachments){
                feed.attachments.map(media => {
                    // check if media is photo or video
                    if(media.type == 'image'){
                        return photosBlock += `
                            <figure class="col-xl-3 col-sm-6" itemprop="associatedMedia" itemscope="">
                                <a
                                href="assets/uploads/${media.path}" itemprop="contentUrl"
                                data-size="1600x950">
                                <img class="img-fluid" src="assets/uploads/${media.path}"
                                    itemprop="thumbnail" alt="Image description">
                                <!-- <div class="caption">
                                    <h4><b>Photos</b><i class="fa fa-heart" style="float: right; color:red;"></i></h4>
                                </div> -->
                                </a>
                                <!-- <figcaption itemprop="caption description">
                                <h4><b>Photos</b></h4>
                                </figcaption> -->
                            </figure>`;
                    }else{
                        return videosBlock += `
                                <figure class="col-md-12 col-sm-12" itemprop="associatedMedia" itemscope="">
                                        <video class="img-fluid rounded" itemprop="thumbnail" controls>
                                            <source src="./assets/uploads/${media.path}" type="video/mp4">
                                        </video>
                                        <!-- <div class="caption">
                                            <h4><b>A thousand songs - music video</b></h4>
                                        </div>
                                        </a> -->
                                </figure>
                        `;
                    }
                });
            }
        });

        // append the loaded content to the page
        photosContainer.innerHTML = photosBlock;
        videoContainer.innerHTML = videosBlock;
    })();
}
loadMedia();