/**
 * Prepare JQUERY autocomplete
 */
$(document).ready(function() {
    var goodies = [];
    $('.shop-goodie').each(function() {
        goodies.push($(this).data('goodie'));
    });

    goodiesNames = goodies.map(function(value) { return value[1]; });
    $('#shop-search').autocomplete({
        source : goodiesNames
    });
});

function shopFilter() {
    $('#shop-best-sellers').addClass('d-none');
    $('#shop-search-result').removeClass('d-none');

    var goodies = [];
    $('.shop-goodie').each(function() {
        goodies.push($(this).data('goodie'));
    });

    var checkedFilter = [];
    $("input[name='category-filter']:checked").each(function () {
        checkedFilter.push($(this).val());
    });

    goodies.forEach(function(element) {
        $('#shop-goodie-'+element[0]).removeClass('d-none');

        if(checkedFilter.length > 0 && !checkedFilter.includes(element[3])) {
            $('#shop-goodie-'+element[0]).addClass('d-none');
        }

        if(!(parseInt(element[2]) <= $('#category-filter-priceMax').val() && parseInt(element[2]) >= $('#category-filter-priceMin').val()))
            $('#shop-goodie-'+element[0]).addClass('d-none');
    });
}

$('#shop-search').change(function () {
    var goodies = [];
    $('.shop-goodie').each(function() {
        goodies.push($(this).data('goodie'));
    });

    console.log(goodiesNames);
});

function addToCart(goodieID, quantity) {
    sendPostAjax('/addToCart', JSON.stringify({
        id_goodie: goodieID,
        quantity: quantity,
        _token: CSRF_TOKEN
    }), null,'JSON', 'POST');
}

function sendOrder(orderID) {
    sendPostAjax('/sendOrder', JSON.stringify({
        id_order: orderID,
        _token: CSRF_TOKEN
    }), function() {
        location.reload();
    },'JSON', 'POST');
}