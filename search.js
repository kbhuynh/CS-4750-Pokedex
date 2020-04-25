$(document).ready(function() {
    $(".card").slice(0, 50).show();
    $("#load").click(function(e){ 
        e.preventDefault();
        $(".card:hidden").slice(0, 50).show(); 
        if($(".card:hidden").length == 0){ 
            $("#load").css('display', 'none');
        }
    });

    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    });


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