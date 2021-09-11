// cache collection of elements so only one dom search needed
var $refElements = $('.ref');

$('.filter_link').click(function(e){
    e.preventDefault();
    // get the category from the attribute
    var filterVal = $(this).data('filter');

    if(filterVal === 'all'){
      $refElements.show();
    }else{
       // hide all then filter the ones to show
       $refElements.hide().filter('.' + filterVal).show();
    }
});