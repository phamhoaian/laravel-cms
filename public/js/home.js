	jQuery(function() {
		jQuery('#bannerscollection_zoominout_majestic').bannerscollection_zoominout({
			skin: 'majestic',
			responsive:true,
			width: 1920,
			height: 1200,
			width100Proc:true,
			// height100Proc:true,
			fadeSlides:true,
			enableTouchScreen:false,
			showNavArrows:true,
			showCircleTimer: false,
			autoHideNavArrows: false,
			showBottomNav:false,
			autoHideBottomNav:false,
			thumbsOnMarginTop:18,
			thumbsWrapperMarginTop: -135,
			pauseOnMouseOver:false
		});		
		
	});

	// Helper function for add element box list in WOW
  	WOW.prototype.addBox = function(element) {
	    this.boxes.push(element);
  	};

  	// Init WOW.js and get instance
  	var wow = new WOW();
  	wow.init();

  	// Attach scrollSpy to .wow elements for detect view exit events,
  	// then reset elements and add again for animation
  	$('.wow').on('scrollSpy:exit', function() {
	    $(this).css({
      		'visibility': 'hidden',
      		'animation-name': 'none'
	    });
	    wow.addBox(this);
  	}).scrollSpy();

  	$('.section-letter').on('scrollSpy:enter', function() {
		this.classList.add('is-inview');
	}).scrollSpy();

	$('.section-letter').on('scrollSpy:exit', function() {
		this.classList.remove('is-inview');
	}).scrollSpy();
