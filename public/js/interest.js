$(document).ready(function () {
    var allInterest = document.querySelectorAll('.interested');
    for (let i = 0; i < allInterest.length; i++) {
        allInterest[i].innerHTML = '<i class="fas fa-heart"></i> Interested'
    }
});


function clickInterest(x) {
    var report_id = $(x).attr('id');
    $.ajax({
        url: '/wishlist/' + report_id + '/store',
        data: {
            _method: 'GET',
        },
        type: "POST",
        success: function () {
            if (x.classList.contains("interested")) {
                x.innerHTML = '<i class="fas fa-heart"></i> Interest';
                x.classList.remove("interested");

            } else {
                x.classList.add("interested");
            }
        }
    });

}

function test(x) {
    if (x.classList.contains("interested")) {
        x.innerHTML = '<i class="fas fa-heart"></i> Interest';
        x.classList.remove("interested");
    } else {
        x.classList.add("interested");
    }
}