
$( document ).ready(function() {
    $('[data-type="ajax"]').fancybox({
        afterShow : function( instance, current ) {
            $('#contactform-verifycode-image').trigger('click');
            $('form').on('beforeSubmit', function(e) {
                var form = $(this);
                var formData = form.serialize();
                $.ajax({
                    url: form.attr("action"),
                    type: form.attr("method"),
                    data: formData,
                    success: function (data) {
                        if(data.img === null){
                            form.html('<b>'+data.msg+'</b>');
                        }else{
                            form.html('<img src="'+data.img+'">');
                        }

                    },
                    error: function () {
                        alert("Something went wrong");
                    }
                });
            }).on('submit', function(e){
                $('#contactform-verifycode-image').trigger('click');
                e.preventDefault();
            });
        }
    });
});