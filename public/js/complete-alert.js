$('form').addEventListener('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: '',
        method: 'POST',
        success: function() {
            Swal.fire(
                'Thank you for submit your reporting',
                'We very appreciate your help. Keep on looking for problem',
                'success'
            ).then(function() {
                window.location = "/";
            });
        },
        error: function() {
            Swal.fire(
                'Something went wrong.',
                'Please try again later.',
                'error'
            )
        }
    })
});