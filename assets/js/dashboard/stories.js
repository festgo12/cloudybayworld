var baseUrl = document.querySelector('meta[name=base]').content;

const openStories = (element, storyModalId, carouselId, userId) => {
    // Get the modal
    var storyModal = document.getElementById(storyModalId);
    storyModal.style.display = "block";

    var timing;

    var storyOwl = $(`#${carouselId}`);
    storyOwl.owlCarousel({
        items: 1,
        loop: false,
        margin: 10,
        dots: false,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplayHoverPause: false,
        nav: false,
        responsive: {
            0: {
                items: 1,
                mergeFit: true
            },
            768: {
                items: 1,
                mergeFit: true
            },
            992: {
                items: 1,
                mergeFit: true

            }
        },
        onInitialize: (event) => {
            clearInterval(timing);
            // get the progress bar element
            var progress_bar = event.target.children.item(0).children.item(0).children.item(0);
            // mark as viewed by sending hhtp request to the server
            if (!progress_bar.classList.contains('viewed')) {
                // send a post request to the server with the form data
                (async () => {
                    await fetch(`${baseUrl}/api/markStoryAsviewed`, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            userId: userId,
                            blogId: progress_bar.attributes.blogid.value
                        })
                    });
                    // remove red indicators indicating un-viewed story
                    element.classList.remove("p-late");
                })();
            }
            // initialize progress bar "width" to zero
            progress_bar.style.width = "0%";
            var progress = 1;
            //  increse progress bar width every 100 milliseconds
            timing = setInterval(() => {
                progress_bar.style.width = `${progress}%`;
                progress++;
                if (progress > 100) {
                    clearInterval(timing);
                    storyModal.style.display = "none";
                }
            }, 100);
        }
    });

    storyOwl.on('changed.owl.carousel', function (event) {
        clearInterval(timing);
        // get the progress bar element
        var progress_bar = event.target.children.item(0).children.item(0).children.item(event.item.index).children.item(0).children.item(0).children.item(0);
        // mark as viewed by sending hhtp request to the server
        if (!progress_bar.classList.contains('viewed')) {
            // send a post request to the server with the form data
            (async () => {
                await fetch(`${baseUrl}/api/markStoryAsviewed`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        userId: userId,
                        blogId: progress_bar.attributes.blogid.value
                    })
                });
                // remove red indicators indicating un-viewed story
                element.classList.remove("p-late");
            })();
        }
        // initialize progress bar "width" to zero
        progress_bar.style.width = "0%";
        var progress = 1;
        //  increse progress bar width every 100 milliseconds
        timing = setInterval(() => {
            progress_bar.style.width = `${progress}%`;
            progress++;
            if (progress > 100) {
                clearInterval(timing);
                storyModal.style.display = "none";
            }
        }, 100);
    });
    storyOwl.trigger('next.owl.carousel');
    storyOwl.trigger('to.owl.carousel', [0]);
}

const closeStories = (storyModalId) => {
    // Get the modal
    var storyModal = document.getElementById(storyModalId);

    storyModal.style.display = "none";
}