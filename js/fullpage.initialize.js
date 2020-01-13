jQuery(document).ready(function() {
	jQuery('#fullpage').fullpage({
    licenseKey: '1A888C19-A30841DA-A1F91489-3AE253E1',

    //Navigation
  	menu: '#main-menu',
		anchors:['home', 'tuberculosis', 'deeplex', 'contact', 'genoscreen'],
  	navigation: true,
  	navigationPosition: 'right',
  	navigationTooltips: ['Home', 'Tuberculosis', 'Deeplex', 'Contact', 'Genoscreen'],

    //Scrolling
    autoScrolling: false,
    // fitToSection: false,

  });
});
