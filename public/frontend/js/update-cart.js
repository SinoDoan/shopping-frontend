function updateCart(event){
    event.preventDefault();
    let urlUpdateCart = $('.update-cart-url').data('url');
    let id = $(this).data('id');
    let quantity = $(this).parents('tr').find('input.quantity').val();
    $.ajax({
        type: "GET",
        url: urlUpdateCart,
        data: {id: id, quantity: quantity},
        success: function (data){
            if(data.code === 200){
                $('.wrapper').html(data.cart_component);
            }
        },
        error: function (){

        }

    });
}
$(function (){
    $(document).on('change', '.update-cart', updateCart);
})
