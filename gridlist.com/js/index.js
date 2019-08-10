
function init() {
    //goods.json faylni chaqirish
    $.getJSON("js/goods.json", goodsOut);
}
function goodsOut(data) {
    var out = "";
    for (var key in data){
        out += '<div class="goods">';
        out += '<img style="float: left; margin: 10px" src="'+ data[key].url +'" >';
        out += '<figure class="fig">';
        out += '<b class="name">'+ data[key].name +'</b><br>';
        out += '<b class="model">'+ data[key].model +'</b><br>';
        out += '<b class="cost">Price: '+ data[key].price +' $</b><br>';
        out += '<span class="title"><b>Title:</b> '+ data[key].title +'</span><br>';
        out += '<button class="ml-5 add-to-cart btn-primary mt-3" data-art="'+ key +'">Buy</button>';
        out += '</figure>';
        out += '</div>';
    }
    $('.goods').html(out);
}

$('a, button').on('click',function(e) {
    if ($(this).hasClass('grid')) {
        $('.container div').removeClass('list').addClass('grid');
    }
    else if($(this).hasClass('list')) {
        $('.container div').removeClass('grid').addClass('list');
    }
});

$(document).ready(function () {
    init();
});