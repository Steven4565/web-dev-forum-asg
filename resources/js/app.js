import './bootstrap';

import Masonry from 'masonry-layout';


// document.addEventListener('livewire:load', () => {
//     initializeMasonry();
// })

function initializeMasonry() {
    console.log("test");
    let elem = document.querySelector('.mason-grid');
    let msnry = new Masonry(elem, {
        itemSelector: '.grid-item-mason',
        columnWidth: 200
    });
}

// import Macy from 'macy';
// let macyInstance = Macy({
//     container: '#macy-container',
// })
//
// macyInstance.on(macyInstance.constants.EVENT_IMAGE_COMPLETE, function (ctx) {
//     console.log('all images have been loaded');
// })
//

initializeMasonry();
