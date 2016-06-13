(function(root) {

	/*
		Selfie Automaton scripts
		Author: Dan Burzo 
		Website: http://danburzo.ro
	*/

	// Global namespace for Selfie Automaton
	var SA = root.SA = {
		init: function() {

			// initialize slideshows
			var gallery_elements = Array.prototype.slice.call(document.querySelectorAll('.layout-gallery .gallery'));
			gallery_elements.forEach(function(galleryEl) {
				new this.Slideshow(galleryEl, {});
			}, this);

			// initialize 'read more'
			var excerpted_content_elements = Array.prototype.slice.call(document.querySelectorAll('.excerpted-text'));
			excerpted_content_elements.forEach(function(excerptedContentEl) {
				new this.ExcerptedContent(excerptedContentEl, {});
			}, this);
		}
	};

	document.addEventListener("DOMContentLoaded", function() {
		SA.init();
	});

	/* Image Slideshows */

	var Slideshow = root.SA.Slideshow = function(galleryEl, opts) {
		return this.initialize(galleryEl, opts || {});
	}

	Slideshow.prototype.initialize = function(galleryEl, opts) {
		this.galleryEl = galleryEl;
		this.opts = opts;
		this.createDOMElements();
		this.attachDOMListeners();

		this.items = Array.prototype.slice.call(this.galleryEl.querySelectorAll('.gallery-item'));
		this.current_item = this.items[0];

		this.items.forEach(function(item) {
			item.className += ' slideshow-item';
		});
		this.current_item.className += ' slideshow-item-current';

		this.updateCounter();
		this.setSlideshowMode(true);

		return this;
	};

	Slideshow.prototype.createDOMElements = function() {
		
		var container = this.container = document.createElement('div');
		container.className = 'slideshow';

		var navigation = this.navigation = document.createElement('div');
		navigation.className = 'slideshow-nav';

		var prevButton = this.prevButton = document.createElement('a');
		prevButton.setAttribute('href', '#');
		prevButton.className = 'slideshow-prev';
		prevButton.innerHTML = 'Previous';

		var nextButton = this.nextButton = document.createElement('a');
		nextButton.setAttribute('href', '#');
		nextButton.className = 'slideshow-next';
		nextButton.innerHTML = 'Next';

		var counter = this.counter = document.createElement('span');
		counter.className = 'slideshow-counter';

		var toggler = this.toggler = document.createElement('a');
		toggler.setAttribute('href', '#');
		toggler.className = 'slideshow-toggle';

		navigation.appendChild(toggler);
		navigation.appendChild(counter);
		navigation.appendChild(prevButton);
		navigation.appendChild(nextButton);

		container.appendChild(navigation);

		this.galleryEl.parentNode.insertBefore(container, this.galleryEl);
		this.galleryEl.parentNode.removeChild(this.galleryEl);
		container.appendChild(this.galleryEl);
	};

	Slideshow.prototype.attachDOMListeners = function() {
		this.prevButton.addEventListener('click', function(e) {
			this.prev();
			e.preventDefault();
		}.bind(this));

		this.nextButton.addEventListener('click', function(e) {
			this.next();
			e.preventDefault();
		}.bind(this));

		this.toggler.addEventListener('click', function(e) {
			this.setSlideshowMode(!this.slideshow_mode);
			e.preventDefault();
		}.bind(this));

		var initX = null, initY = null;
		this.galleryEl.addEventListener('touchstart', function(e) {
			var touches = e.changedTouches;
			if (touches.length) {
				initX = touches[0].clientX;
				initY = touches[0].clientY;
			}
		}.bind(this));

		var SWIPE_THRESHOLD = 20;
		var VERTICAL_THRESHOLD = 100;

		this.galleryEl.addEventListener('touchend', function(e) {
			if (initX !== null) {
				var touches = e.changedTouches;
				if (touches.length) {
					var finalX = touches[0].clientX;
					var finalY = touches[0].clientY;
					var deltaX = initX - finalX;
					var deltaY = initY - finalY;
					if (Math.abs(deltaX) > SWIPE_THRESHOLD && Math.abs(deltaY) < VERTICAL_THRESHOLD) {
						if (deltaX > 0) {
							this.next();
						} else {
							this.prev();
						}
					}
				}
			}
			initX = null;
		}.bind(this));
	};

	Slideshow.prototype.prev = function() {
		var prev = this.current_item.previousElementSibling;
		this.goTo(prev || this.items[this.items.length - 1]);
	};

	Slideshow.prototype.next = function() {
		var next = this.current_item.nextElementSibling;
		this.goTo(next || this.items[0]);
	};

	Slideshow.prototype.goTo = function(item) {
		this.current_item.className = this.current_item.className.replace('slideshow-item-current', '').replace(/\s+/, ' ');
		item.className += ' slideshow-item-current';
		this.current_item = item;
		this.updateCounter();
	};

	Slideshow.prototype.updateCounter = function() {
		var idx = (this.current_item ? this.items.indexOf(this.current_item) : 0) + 1;
		this.counter.textContent = idx + ' of ' + this.items.length;
	};

	Slideshow.prototype.setSlideshowMode = function(flag) {
		this.slideshow_mode = flag;
		if (this.slideshow_mode) {
			this.toggler.textContent = '☰ List';
			this.container.className += ' slideshow-active';
	 	} else {
	 		this.toggler.textContent = '⎅ Slideshow';
	 		this.container.className = this.container.className.replace('slideshow-active', '').replace(/\s+/, ' ');
	 	}
	}

	var ExcerptedContent = root.SA.ExcerptedContent = function(el, opts) {
		return this.initialize(el, opts || {});
	};

	ExcerptedContent.prototype.initialize = function(el, opts) {
		this.container = el;
		this.readMore = el.querySelector('.read-more');
		this.expanded = true;
		if (this.readMore) {
			this.container.className += ' excerpted-text-active excerpted-text-collapsed';
			this.expanded = false;

			var excerptedContentExpand = document.createElement('a');
			excerptedContentExpand.className = 'excerpted-text-expand';
			excerptedContentExpand.setAttribute('href', '#');

			excerptedContentExpand.addEventListener('click', function(e) {
				this.toggleExpand();
				e.preventDefault();
			}.bind(this));

			this.readMore.parentNode.insertBefore(excerptedContentExpand, this.readMore);
		}
		return this;
	};

	ExcerptedContent.prototype.toggleExpand = function() {
		if (this.expanded) {
			this.container.className += ' excerpted-text-collapsed';
		} else {
			this.container.className = this.container.className.replace('excerpted-text-collapsed', '').replace(/\s+/, ' ');
		}
		this.expanded = !this.expanded;
	};

})(window);