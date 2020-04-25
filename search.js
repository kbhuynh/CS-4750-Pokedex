$(document).ready(function() {
    $('#search').on('input', function() {
        filterSelection(($('#search').val()).toLowerCase());
    });

    $('#sort').change(function() {
        var alphabeticallyOrderedDivs = $('.card').sort(function(a, b) {
        if($('#sort').val() == "alphaA") {
            return String.prototype.localeCompare.call($(a).data('name').toLowerCase(), $(b).data('name').toLowerCase());
        } else if($('#sort').val() == "alphaD") {
            return String.prototype.localeCompare.call($(b).data('name').toLowerCase(), $(a).data('name').toLowerCase());
        } else {
            return $(a).data('number') - $(b).data('number');
        }
    });

    var container = $("#wrapper");
    container.detach().empty().append(alphabeticallyOrderedDivs);
    $('#wrapperParent').append(container);

    });

});

function filterSelection(query) {
    let allPokemon = document.getElementsByClassName('card');
    for(let i = 0; i < allPokemon.length; i++) {
        if(!$(allPokemon[i]).data('name').includes(query)) {
            $(allPokemon[i]).css('display', 'none');
        } else {
            $(allPokemon[i]).css('display', 'block');
        }
    }
}