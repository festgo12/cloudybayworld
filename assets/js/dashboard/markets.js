var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
// get category from url #hash
const requestCategory = decodeURIComponent(window.location.hash);

const getMarketList = (hash) => {
    // send a get request to the server
    // get the markets based on the selected category
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/getShops/${hash || 'Markets'}`, {
            method: 'GET',
        });
        const content = await rawResponse.json();
        // add the fetched categories to the Product category input
        const marketList = document.querySelector(`#marketList`);
        // map through the categories
        let markets = '';
        content.map(market => {
            markets += `<div class="col-sm-12 col-md-12">
                            <div class="prooduct-details-box">
                                <div class="media">
                                    <div class="row">
                                    <div class="col-md-4">
                                        <a href="market_view.html"><img class="align-self-center img-fluid img-60"
                                            src="./assets/uploads/${market.attachments['path']}" alt="#"
                                            style="width:100%!important; height:100%;"></a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product-name">
                                        <h5><a href="market/${market.slug}"><b>${market.shopName}</b></a></h5>
                                        </div>
                                        <div class="rating"><span><i class="fa fa-star font-warning"></i><i
                                            class="fa fa-star font-warning"></i><i
                                            class="fa fa-star font-warning"></i><i
                                            class="fa fa-star font-warning"></i><i
                                            class="fa fa-star font-dark"></i></span><span
                                            style="color:black">(206)</span></div>
                                        <div class="price d-flex">
                                        <div class="text-muted me-2">
                                            <span style="color:red">Closed </span> 
                                            Opened ${market.startTime}am
                                        </div>
                                        </div>
                                        <div class="avaiabilty">
                                        <div>${market.description}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-12"><span class="fa fa-check-square font-warning"><span>
                                        </div>
                                        <div class="col-md-12"><a class="btn btn-default text-primary" href="#"><span
                                            class="fa fa-paper-plane">DIRECTION<span> </a></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
        });
        marketList.innerHTML = markets;
    })();
}
getMarketList(requestCategory.slice(1));


const getShopCategories = () => {
    // send a get request to the server
    (async () => {
        const rawResponse = await fetch(`${baseUrl}/api/shopCategories`, {
            method: 'GET',
        });
        const content = await rawResponse.json();
        // add the fetched categories to the category list
        const tagList = document.querySelector(`#tagList`);
        // map through the categories
        let categories = '';
        content.map(category => {
            categories += `<a onclick="getMarketList('${category.category_name}')" href="#${category.category_name}" 
                                role="tab" aria-selected="true">
                                <span class="title">${category.category_name}</span>
                            </a>`;
        });
        tagList.innerHTML = categories;
    })();
}
getShopCategories();