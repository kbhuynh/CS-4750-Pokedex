$(document).ready(function() {
    $('#search').on('input', function() {
        filterSelection(($('#search').val()).toLowerCase());
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