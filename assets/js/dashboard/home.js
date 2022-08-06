var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

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
        let categories = '<h6  data-bs-original-title="" style="margin: auto;" class="text-center p-t-5 m-b-10" title=""><strong> Select Catlog</strong></h4>';
        content.map(category => {
            categories += `<a href="markets#${category.category_name}" data-bs-original-title="" title="">
                                ${category.icon_path} 
                                ${category.category_name}
                            </a>`;
        });
        tagList.innerHTML = categories;
    })();
}
getShopCategories();