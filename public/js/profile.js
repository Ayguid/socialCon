window.onload = function() {

  document.getElementById("submitPic").addEventListener("click", uploadProfilePhoto);
  document.getElementById("submitPic").addEventListener("click", function(event){
    event.preventDefault();

  });




  function uploadProfilePhoto(){
    var data = new FormData();
    data.append('image', $('input[type=file]')[0].files[0]);
    $.ajax({
      url: '/profile',
      type: "POST",
      timeout: 5000,
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success: function(response){
        if (response.code == 200){
          swal({
            title: "Good job!",
            text: "Your pic was Uploaded!",
            icon: "success",
            timer: 3000,
          }).then((value) => {
            window.location.replace("/profile");
          });
        }else{
          swal({
            title: "Error?",
            text: "Try again, or another pic!",
            icon: "warning",
          }).then((value) => {
            window.location.replace("/profile");
          });
        }
      },
      error: function(){
        swal({
          title: "Error?",
          text: "Try again, or another pic!",
          icon: "error",

        });
      }
    });
  }
}



$(document).ready(function(){
  $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });


  $('.btn-file :file').on('fileselect', function(event, label) {
    var input = $(this).parents('.input-group').find(':text'),
    log = label;

    if( input.length ) {
      input.val(log);
    } else {
      if( log ) swal(log);
    }
  });


  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e){
        $('#img-upload').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imgInp").change(function(){
    readURL(this);
  });
});
