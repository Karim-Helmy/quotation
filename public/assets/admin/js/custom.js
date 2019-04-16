$('.delete-button').on('click',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this action!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        } else {
          swal("You Are Safe :)");
        }
      });
});


