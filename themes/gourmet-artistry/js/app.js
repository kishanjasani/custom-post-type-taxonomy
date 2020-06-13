jQuery(document).foundation();

jQuery( function( $ ) {
	$( '#recipes > div' ).not( ':first' ).hide();
	$( '#filter .menu li:first-child' ).addClass( 'active' );
	$( '#filter .menu a' ).on( 'click', function() {
		$( '#filter .menu li' ).removeClass( 'active' );
		$( this ).parent().addClass( 'active' );
		var recipe_link = $( this ).attr( 'href' );
		$( '#recipes > div' ).hide();
		$( recipe_link ).show();
		return false;
	} );

	var date = new Date();
	var time = date.getHours();
	var meal = '';
	if (time <= 10) {
		meal= 'breakfast';
	} else if ( time >= 11 && time <=17 ) {
		meal = 'lunch';
	} else {
		meal = 'dinner';
	}

	console.log(meal);
	$('h2#time').append(meal);
	jQuery.ajax({
		url: ajax_data.ajax_url,
		type: 'POST',
		data: {
			action: 'recipe_breakfast'
		}
	}).done( function(response) {
		$.each( response, function( index, object ) {
			var recipe_meal = '<li class="medium-4 small-12 columns">'
							  + object.image +
							  '<div class="content">' +
							  '<h3 class="text-center">'+
							  '<a href="' + object.link + '">'+
							  object.name +
							  '</a>' +
							  '</h3>' +
							  '</div>' +
							  '</li>';
			$('#meal-per-hour').append(recipe_meal);
		} );
	} );
} );
