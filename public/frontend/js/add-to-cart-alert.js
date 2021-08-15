function addToCart(event) {
    event.preventDefault();
    let url = $(this).data('url');
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function (data) {
            console.log(data);
        },
        error: function () {

        }
    })
    swal({
        title: "Đã thêm vào giỏ hàng",
        icon: "success",
        button: false,
        timer: 1500
    });
}

$(function () {
    $('.add-to-cart').on('click', addToCart);
})
