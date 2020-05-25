$( document ).ready(function() {
  $("#datatable").DataTable();
});
  $(document).ready(function(){
        $(".alert-success").delay(1000).slideUp(300);
    });
  $(document).ready(function(){
        $(".alert-danger").delay(1000).slideUp(300);
    });

 $(document).ready(function () {
     
var BASE_URL=$('input:hidden[name=url]').val();
    $('#remove-logo').on('click', function (e) { 
        $('#company-logo').attr('src', BASE_URL+'images/image-icon.png');
        $('#logo-name').text('');
        $('#logo').val('');
        $('#logo').attr('required', 'required');
    });
    $('#logo').change(function () {
        var fp = $("#logo");
        var lg = fp[0].files.length; // get length
        var items = fp[0].files;
        var fileSize = 0;
        var fileType = [];
        if (lg > 0) {
            for (var i = 0; i < lg; i++) {
                fileSize = fileSize + items[i].size; // get file size

                if (!$(this).val().match(/(?:jpg|jpeg|JPG|JPEG|png)$/)) {
                    fileType.push(true);
                }
            }
            if (fileType.length > 0) {
                if ((fileType.indexOf(true)) != -1) {
                    toastr.error('Please upload a valid image.');
                    $('#image').val('');
                    return false;
                }
            }
            if (fileSize > 2500000) {
                toastr.error('Logo size must not be more than 2 MB.');
                $('#image').val('');
                return false;
            }
        }
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        $('#logo-name').text(input.files[0].name);
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#company-logo').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
