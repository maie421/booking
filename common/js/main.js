const heartClick = (code) => {
    $.ajax({
        url: "../ajax/main/heartInsertOrDelete.php",
        type: "POST",
        data: {code: code},
        dataType: "JSON",
        success: function (data) {
            if ($(`.${code}`).hasClass('bi-heart')){
                console.log();
                $(`.bi-heart.${code}`).addClass('bi-suit-heart-fill');
                $(`.bi-heart.${code}`).removeClass('bi-heart');
            }else {
                $(`.bi-suit-heart-fill.${code}`).addClass('bi-heart');
                $(`.bi-suit-heart-fill.${code}`).removeClass('bi-suit-heart-fill');
            }
        }
    });
}