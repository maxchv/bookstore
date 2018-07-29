/**
 * Created by Vladyslav on 7/27/2018.
 */
$(".product-remove").click(function(e){



    var data={
        Id: $(this).siblings('.Id').val()
    };

    $.ajax({
        type: "GET",
        url: "http://localhost:8080/cart/removefromcart",
        data: data,

        success: function(e)
        {
            $(`.cart-list .${data.Id}`).remove();
            $('.cartIcon').html($(".product-remove").length);
        }
    });
});
