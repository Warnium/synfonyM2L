/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import './styles/m2l.css';
// start the Stimulus application
import './bootstrap';

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// var $ = require('jquery');
const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

const logoPath = require('./img/foot.jpg'); 



var cpCreditsUrl = "https://codepen.io/PickJBennett/details/BdbrMW";
var cpCreditsTwitter = document.getElementById("js-tweet-this");
cpCreditsTwitter.href = "https://twitter.com/intent/tweet?text=" + "&url=" + encodeURI(cpCreditsUrl) + "&via=PickJBennett&related=PickJBennett,CiaoFileManager";
cpCreditsTwitter.innerHTML += "Tweet This Pen";