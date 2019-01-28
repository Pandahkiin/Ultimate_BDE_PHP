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