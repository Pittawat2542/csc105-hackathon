function completeAlert(){
    Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
    ).then(function() {
        window.location = "/";
    });
}