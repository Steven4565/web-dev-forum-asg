import './bootstrap';

import Masonry from 'masonry-layout';


var elem = document.querySelector('.mason-grid');
var msnry = new Masonry(elem, {
    itemSelector: '.grid-item-mason',
    columnWidth: 200
});

console.log(msnry);
