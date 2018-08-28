<?php 
/*
	Template Name: Gallery
*/
get_header(); ?>

<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat:800|Roboto+Slab:400,700");
* {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  margin: 0;
  height: 100vh;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  background: #ececec;
  font-family: 'Roboto Slab', 'Courier New', Courier, monospace;
}

h1,
h2,
h3,
h4 {
  font-family: 'Montserrat', sans-serif;
  font-weight: 800;
}

.gallery {
  max-width: calc((150px*2) + 1em);
  padding: 3em 0;
  color: #333;
}
@media (min-width: 768px) {
  .gallery {
    max-width: calc((150px*4) + 3em);
  }
}
.gallery__title {
  font-size: 2em;
  padding-bottom: 0.25em;
  border-bottom: 1px solid #666;
}
.gallery__intro {
  margin: 0 0 2em;
}
.gallery__intro p {
  line-height: 1.5em;
}
.gallery ul {
  list-style: none;
  margin: 0;
  padding: 0;
  width: 100%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
}
.gallery li {
  margin-bottom: 1em;
  border-radius: 3px;
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
          box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  -webkit-transform: scale(1);
          transform: scale(1);
  -webkit-transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}
.gallery li:hover {
  -webkit-transform: scale(1.0221);
          transform: scale(1.0221);
  -webkit-box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
          box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}
.gallery img {
  display: block;
  border-radius: 3px;
}

.m-lightbox {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: rgba(255, 255, 255, 0.9);
  z-index: 1;
  opacity: 0;
  -webkit-transform: scale(0.8);
          transform: scale(0.8);
  -webkit-transition: opacity 0.3s ease-out, -webkit-transform 0.3s ease-out;
  transition: opacity 0.3s ease-out, -webkit-transform 0.3s ease-out;
  transition: opacity 0.3s ease-out, transform 0.3s ease-out;
  transition: opacity 0.3s ease-out, transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
  pointer-events: none;
}
.m-lightbox.is-active {
  opacity: 1;
  -webkit-transform: scale(1);
          transform: scale(1);
  z-index: 101;
  pointer-events: auto;
}
.m-lightbox__slider {
  list-style: none;
  margin: 0;
  padding: 0;
  width: 100vw;
  height: 100vh;
}
.m-lightbox__slide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}
.m-lightbox__slide img {
  display: block;
  max-width: calc(100vw - 2em);
  max-height: 90vh;
  opacity: 0;
  -webkit-transition: opacity 0.3s ease;
  transition: opacity 0.3s ease;
}
@media (min-width: 768px) {
  .m-lightbox__slide img {
    max-width: calc(100vw - 116px);
    max-height: 90vh;
  }
}
.m-lightbox__slide.is-loaded.is-active img {
  opacity: 1;
}
.m-lightbox__slide.is-loaded.is-active .spinner {
  display: none;
}
.m-lightbox button {
  position: absolute;
  margin: 0;
  padding: 0;
  z-index: 102;
  background: transparent;
  border: none;
  cursor: pointer;
}
.m-lightbox__close {
  top: 1em;
  right: 1em;
}
.m-lightbox__nextPrev {
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  width: 42px;
  height: 42px;
  visibility: hidden;
  opacity: 0;
  -webkit-transform: scale(0.5);
          transform: scale(0.5);
  -webkit-transition: opacity 0.3s ease-out, -webkit-transform 0.3s ease-out;
  transition: opacity 0.3s ease-out, -webkit-transform 0.3s ease-out;
  transition: opacity 0.3s ease-out, transform 0.3s ease-out;
  transition: opacity 0.3s ease-out, transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
}
.m-lightbox__nextPrev.is-active {
  visibility: hidden;
  -webkit-transform: scale(1);
          transform: scale(1);
  opacity: 1;
}
@media (min-width: 1024px) {
  .m-lightbox__nextPrev.is-active {
    visibility: visible;
  }
}
.m-lightbox__nextPrev svg {
  display: block;
  width: 100%;
  height: auto;
}
.m-lightbox__nextPrev--next {
  right: 1em;
}
.m-lightbox__nextPrev--prev {
  left: 1em;
}
.m-lightbox__nextPrev:hover {
  cursor: pointer;
}
.m-lightbox__counter {
  position: absolute;
  bottom: 1em;
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  color: #333;
  font-weight: 700;
}

.spinner {
  width: 40px;
  height: 40px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translateY(-50%) translateX(-50%);
          transform: translateY(-50%) translateX(-50%);
}
.spinner::before, .spinner::after {
  content: '';
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #333;
  opacity: 0.6;
  position: absolute;
  top: 0;
  left: 0;
  -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
          animation: sk-bounce 2.0s infinite ease-in-out;
}
.spinner::after {
  -webkit-animation-delay: -1.0s;
          animation-delay: -1.0s;
}

@-webkit-keyframes sk-bounce {
  0%, 100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

@keyframes sk-bounce {
  0%, 100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

</style>



<div class="gallery">
  <div class="gallery__intro">
    <h1 class="gallery__title">Lightbox, is that still a thing?</h1>
    <p>Well I needed a simple, fullscreen, css based, touch/keyboard friendly lightbox/slideshow and here it is! The script takes in a selector, queries it for all items and creates a lightbox/slideshow out of them.</p>
    <p>this is the most basic version. The next version will be animated, probably with the popmotion library.</p>
    <p>Any tips to make this script a bit more 'pluggable' are most welcome in the comments!</p>
  </div>
  <ul>
    <li class="gallery__item"><a class="gallery__itemLink" href="https://farm5.staticflickr.com/4390/36837410552_88e7054780_k_d.jpg" data-rel="aiLightbox"><img class="gallery__itemThumb" src="https://farm5.staticflickr.com/4390/36837410552_fbeb6d1cdc_q_d.jpg"/></a></li>
    <li class="gallery__item"><a class="gallery__itemLink" href="https://farm5.staticflickr.com/4357/36172707494_53c0f25d98_h_d.jpg" data-rel="aiLightbox"><img class="gallery__itemThumb" src="https://farm5.staticflickr.com/4357/36172707494_2b8ea05f04_q_d.jpg"/></a></li>
    <li class="gallery__item"><a class="gallery__itemLink" href="https://farm5.staticflickr.com/4347/36857337771_4092a556e7_k_d.jpg" data-rel="aiLightbox"><img class="gallery__itemThumb" src="https://farm5.staticflickr.com/4347/36857337771_d1bb7f798a_q_d.jpg"/></a></li>
    <li class="gallery__item"><a class="gallery__itemLink" href="https://farm5.staticflickr.com/4421/36997408855_a0a13bae79_k_d.jpg" data-rel="aiLightbox"><img class="gallery__itemThumb" src="https://farm5.staticflickr.com/4421/36997408855_bfdb9f1fba_q_d.jpg"/></a></li>
    <li class="gallery__item"><a class="gallery__itemLink" href="https://farm5.staticflickr.com/4388/36996947395_8577ae759c_k_d.jpg" data-rel="aiLightbox"><img class="gallery__itemThumb" src="https://farm5.staticflickr.com/4388/36996947395_db3c348ccb_q_d.jpg"/></a></li>
    <li class="gallery__item"><a class="gallery__itemLink" href="https://farm5.staticflickr.com/4379/36844732181_a6b854636e_k_d.jpg" data-rel="aiLightbox"><img class="gallery__itemThumb" src="https://farm5.staticflickr.com/4379/36844732181_78bd19e9eb_q_d.jpg"/></a></li>
    <li class="gallery__item"><a class="gallery__itemLink" href="https://farm5.staticflickr.com/4333/36825444362_d157245677_k_d.jpg" data-rel="aiLightbox"><img class="gallery__itemThumb" src="https://farm5.staticflickr.com/4333/36825444362_4291ce6d1e_q_d.jpg"/></a></li>
    <li class="gallery__item"><a class="gallery__itemLink" href="https://farm5.staticflickr.com/4348/36844765631_1f3df298d8_k_d.jpg" data-rel="aiLightbox"><img class="gallery__itemThumb" src="https://farm5.staticflickr.com/4348/36844765631_03e90607bd_q_d.jpg"/></a></li>
  </ul>
</div>



<div class="m-lightbox">
                <div class="m-lightbox__controls">
                    <button class="m-lightbox__close">
                        <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                            <path d="M0 0h24v24H0z" fill="none"></path>
                        </svg>
                    </button>
                    <button class="m-lightbox__nextPrev m-lightbox__nextPrev--prev is-active">
                        <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
                        </svg>
                    </button>
                    <button class="m-lightbox__nextPrev m-lightbox__nextPrev--next is-active">
                        <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                        </svg>
                    </button>
                </div>
                <ul class="m-lightBox__slider">
                    
                <li class="m-lightbox__slide" style="transform: translateX(-100vw); transition: opacity 0.4s ease;">
                    
                        <img data-src="https://farm5.staticflickr.com/4390/36837410552_88e7054780_k_d.jpg">
                    
                </li>
            
                <li class="m-lightbox__slide is-loaded" style="transform: translateX(0vw); transition: opacity 0.4s ease;">
                    
                        <img data-src="https://farm5.staticflickr.com/4357/36172707494_53c0f25d98_h_d.jpg" src="https://farm5.staticflickr.com/4357/36172707494_53c0f25d98_h_d.jpg">
                    
                <div class="spinner"></div></li>
            
                <li class="m-lightbox__slide" style="transform: translateX(100vw); transition: opacity 0.4s ease;">
                    
                        <img data-src="https://farm5.staticflickr.com/4347/36857337771_4092a556e7_k_d.jpg">
                    
                </li>
            
                <li class="m-lightbox__slide" style="transform: translateX(200vw); transition: opacity 0.4s ease;">
                    
                        <img data-src="https://farm5.staticflickr.com/4421/36997408855_a0a13bae79_k_d.jpg">
                    
                </li>
            
                <li class="m-lightbox__slide" style="transform: translateX(300vw); transition: opacity 0.4s ease;">
                    
                        <img data-src="https://farm5.staticflickr.com/4388/36996947395_8577ae759c_k_d.jpg">
                    
                </li>
            
                <li class="m-lightbox__slide" style="transform: translateX(400vw); transition: opacity 0.4s ease;">
                    
                        <img data-src="https://farm5.staticflickr.com/4379/36844732181_a6b854636e_k_d.jpg">
                    
                </li>
            
                <li class="m-lightbox__slide" style="transform: translateX(500vw); transition: opacity 0.4s ease;">
                    
                        <img data-src="https://farm5.staticflickr.com/4333/36825444362_d157245677_k_d.jpg">
                    
                </li>
            
                <li class="m-lightbox__slide" style="transform: translateX(600vw); transition: opacity 0.4s ease;">
                    
                        <img data-src="https://farm5.staticflickr.com/4348/36844765631_1f3df298d8_k_d.jpg">
                    
                </li>
            
                </ul>
                <div class="m-lightbox__counter">2/8</div>
            </div>







<script>
	var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

var _class, _temp, _initialiseProps;

function _objectWithoutProperties(obj, keys) { var target = {}; for (var i in obj) {if (window.CP.shouldStopExecution(1)){break;}if (window.CP.shouldStopExecution(1)){break;} if (keys.indexOf(i) >= 0) continue; if (!Object.prototype.hasOwnProperty.call(obj, i)) continue; target[i] = obj[i]; }
window.CP.exitedLoop(1);

window.CP.exitedLoop(1);
 return target; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Lightbox = (_temp = _class = function Lightbox(_ref) {
    var _ref$lazyload = _ref.lazyload,
        lazyload = _ref$lazyload === undefined ? true : _ref$lazyload,
        _ref$counter = _ref.counter,
        counter = _ref$counter === undefined ? true : _ref$counter,
        _ref$arrows = _ref.arrows,
        arrows = _ref$arrows === undefined ? true : _ref$arrows,
        _ref$slideSpeed = _ref.slideSpeed,
        slideSpeed = _ref$slideSpeed === undefined ? 400 : _ref$slideSpeed,
        options = _objectWithoutProperties(_ref, ['lazyload', 'counter', 'arrows', 'slideSpeed']);

    _classCallCheck(this, Lightbox);

    _initialiseProps.call(this);

    if (!options.selector) {
        console.error('Please add a valid css selector with the option "selector:"');
    } else if (typeof options.selector !== 'string') {
        console.error(options.selector, 'is not a string but a(n) ' + _typeof(options.selector));
    } else {
        this.selector = options.selector;
        this.lazyload = lazyload;
        this.counter = counter;
        this.arrows = arrows;
        this.slideSpeed = slideSpeed;

        this.links = Array.from(document.querySelectorAll('a' + options.selector));
        this.offsets = [];
        this.nodes = {};
        this.imageIndex = null;
        if (this.links.length > 0) {
            this.createLightbox();
            this.createNodes();
            this.eventListeners(this.links);
        } else {
            console.error('The selector \'' + this.selector + '\' did not yield results. Please make sure the selector is applied on an \'a\' element.');
        }
    }
}, _initialiseProps = function _initialiseProps() {
    var _this = this;

    this.goTo = function (num, event) {
        var _nodes = _this.nodes,
            items = _nodes.items,
            counter = _nodes.counter,
            lightboxNode = _nodes.lightboxNode;

        if (_this.counter) {
            counter.innerHTML = num + 1 + '/' + _this.links.length;
        }
        var spinner = '<div class="spinner"></div>';
        var img = items[num].querySelector('img');
        if (_this.lazyload) {
            var src = img.getAttribute('data-src');
            items[num].insertAdjacentHTML('beforeend', spinner);
            // Set image attribute
            img.setAttribute('src', src);

            // Add class to slide item when image is completely loaded. Must be in this order. 
            var imgLoad = new Image();
            imgLoad.onload = function () {
                items[num].classList.add('is-active');
                items[num].classList.add('is-loaded');
            };
            imgLoad.src = src;
        } else {
            items[num].classList.add('is-active');
            items[num].classList.add('is-loaded');
        }

        // Change the offset for each slide based on its index and the current index.
        for (var i = 0; i < _this.offsets.length; i++) {if (window.CP.shouldStopExecution(2)){break;}if (window.CP.shouldStopExecution(2)){break;}
            var offset = _this.offsets[i] - num * 100;

            items[i].style.transform = 'translateX(' + offset + 'vw)';

            // Add transition type based on which event was triggered
            if (event) {
                if (event.target.className === 'gallery__itemThumb') {
                    items[i].style.transition = 'opacity 0.4s ease';
                } else {
                    items[i].style.transition = 'transform ' + _this.slideSpeed + 'ms ease-out';
                }
            }
        }
window.CP.exitedLoop(2);

window.CP.exitedLoop(2);

    };

    this.createNodes = function (links) {
        // Find all the lightbox nodes and add them to an object
        Object.assign(_this.nodes, {
            lightboxNode: document.querySelector('.m-lightbox'),
            items: Array.from(document.querySelectorAll('.m-lightbox__slide')),
            next: document.querySelector('.m-lightbox__nextPrev--next'),
            prev: document.querySelector('.m-lightbox__nextPrev--prev'),
            close: document.querySelector('.m-lightbox__close')

        });

        Object.assign(_this.nodes, {
            counter: document.querySelector('.m-lightbox__counter')
        });
    };

    this.eventListeners = function (links) {
        var _nodes2 = _this.nodes,
            lightboxNode = _nodes2.lightboxNode,
            items = _nodes2.items,
            next = _nodes2.next,
            prev = _nodes2.prev,
            close = _nodes2.close;

        links.forEach(function (item, index) {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                lightboxNode.classList.add('is-active');
                document.body.style.overflow = 'hidden';
                _this.imageIndex = index;
                _this.goTo(index, e);
                _this.setNav(index);
            });
        });

        next.addEventListener('click', function (e) {
            _this.goToNext(e);
        });

        prev.addEventListener('click', function (e) {
            _this.goToPrev(e);
        });

        close.addEventListener('click', function () {
            _this.closeBox();
        });

        document.onkeydown = function (e) {
            switch (e.keyCode) {
                case 37:
                    _this.goToPrev(e);
                    break;
                case 39:
                    _this.goToNext(e);
                    break;
                case 27:
                    _this.closeBox();
                    break;
            };
        };

        items.forEach(function (item) {
            // https://gist.github.com/Tam/d44c87b3daeb07b15984ddc6127d4e34
            new Swipe(item.querySelector('img'), function (e, direction) {
                e.preventDefault();
                switch (direction) {
                    case "up":
                        // Handle Swipe Up
                        break;
                    case "down":
                        // Handle Swipe Down
                        break;
                    case "left":
                        _this.goToNext(e);
                        break;
                    case "right":
                        _this.goToPrev(e);
                        break;
                }
            });
        });
    };

    this.setNav = function (index) {
        if (_this.arrows) {
            var _nodes3 = _this.nodes,
                next = _nodes3.next,
                prev = _nodes3.prev;

            if (index < _this.links.length - 1) {
                next.classList.add('is-active');
            }
            if (index >= _this.links.length - 1) {
                next.classList.remove('is-active');
            }
            if (index > 0) {
                prev.classList.add('is-active');
            }
            if (index <= 0) {
                prev.classList.remove('is-active');
            }
        }
    };

    this.goToNext = function (e) {
        var items = _this.nodes.items;

        if (_this.imageIndex < items.length - 1) {
            _this.goTo(_this.imageIndex + 1, e);
            setTimeout(function () {
                items[_this.imageIndex - 1].classList.remove('is-active');
            }, _this.slideSpeed);
            _this.imageIndex += 1;
            _this.setNav(_this.imageIndex);
        }
    };

    this.goToPrev = function (e) {
        var items = _this.nodes.items;

        if (_this.imageIndex > 0) {
            _this.goTo(_this.imageIndex - 1, e);
            setTimeout(function () {
                items[_this.imageIndex + 1].classList.remove('is-active');
            }, _this.slideSpeed);
            _this.imageIndex -= 1;
            _this.setNav(_this.imageIndex);
        }
    };

    this.closeBox = function () {
        var _nodes4 = _this.nodes,
            lightboxNode = _nodes4.lightboxNode,
            items = _nodes4.items;

        lightboxNode.classList.remove('is-active');
        document.body.style.overflow = 'auto';
        setTimeout(function () {
            items.forEach(function (item) {
                return item.classList.remove('is-active');
            });
        }, _this.slideSpeed);
    };

    this.renderImages = function (images) {
        var imagesLinks = images.map(function (item, index) {
            var offset = index * 100;
            _this.offsets.push(offset);
            var imageSrc = item.getAttribute('href');
            return '\n                <li class=\'m-lightbox__slide\' style=\'transform: translateX(' + offset + 'vw)\'>\n                    ' + (_this.lazyload ? '\n                        <img data-src=\'' + imageSrc + '\'/>\n                    ' : '\n                        <img src=\'' + imageSrc + '\'/>\n                    ') + '\n                </li>\n            ';
        });
        return imagesLinks;
    };

    this.createLightbox = function () {
        var lightbox = '\n            <div class=\'m-lightbox\'>\n                <div class=\'m-lightbox__controls\'>\n                    <button class=\'m-lightbox__close\'>\n                        <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">\n                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>\n                            <path d="M0 0h24v24H0z" fill="none"/>\n                        </svg>\n                    </button>\n                    <button class=\'m-lightbox__nextPrev m-lightbox__nextPrev--prev\'>\n                        <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">\n                            <path d="M0 0h24v24H0z" fill="none"/>\n                            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>\n                        </svg>\n                    </button>\n                    <button class=\'m-lightbox__nextPrev m-lightbox__nextPrev--next\'>\n                        <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">\n                            <path d="M0 0h24v24H0z" fill="none"/>\n                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>\n                        </svg>\n                    </button>\n                </div>\n                <ul class=\'m-lightBox__slider\'>\n                    ' + _this.renderImages(_this.links).join('') + '\n                </ul>\n                <div class=\'m-lightbox__counter\'>\n                </div>\n            </div>\n        ';
        document.body.insertAdjacentHTML('beforeend', lightbox);
    };
}, _temp);


var lb = new Lightbox({
    selector: '[data-rel="aiLightbox"]', // string
    lazyload: true, // boolean
    arrows: true, // boolean    
    counter: true, // boolean
    slideSpeed: 500 //number(ms)
});

</script>

<?php get_footer(); ?>