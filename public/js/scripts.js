$(document).ready(function() {
    $('select').niceSelect();

    $(".nice-select span.current").bind("DOMNodeInserted",function(ev) {
        let x = $(".nice-select span.current ~ ul.list > li.selected").attr("data-value");
        console.log(x);
        if(x!='Nothing'){
            window.location = "/category/"+x;
        }
    })
});