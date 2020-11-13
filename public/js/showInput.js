$(document).ready(function () {
    $('.payment_radio').click(function () {
        var inputValue = $(this).attr("value");
        // var targetBox = $("." + inputValue);
        // $(".box").not(targetBox).hide();
        // $(targetBox).show();
        if (inputValue == 1) {
            $(".upload_proof").show();
        }
        else {
            $(".upload_proof").hide();
        }

    });
});