import './bootstrap';

import Masonry from 'masonry-layout';

let elem = document.querySelector('.mason-grid');
let msnry = new Masonry(elem, {
    itemSelector: '.grid-item-mason',
    columnWidth: 200
});


