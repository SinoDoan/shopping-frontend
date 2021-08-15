function deleteCart(event){
    event.preventDefault();
    let urlDeleteCart = $('.delete-cart-url').data('url');
    let id = $(this).data('id');
    $.ajax({
        type: "GET",
        url: urlDeleteCart,
        data: {id: id},
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
    $(document).on('click', '.cart-delete', deleteCart);
})
