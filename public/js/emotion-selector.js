$('.selection img').on("mouseenter", function () {
    $(this).siblings('span').removeClass('hidden');
}).on("mouseleave", function() {
    $(this).siblings('span').addClass('hidden');
});

$('.selection img').on("click", function() {
    $(this).closest('.emotion-selector').find('.selection img').removeClass('size-24');
    $(this).addClass("size-24");
    $(this).closest('.emotion-selector').find('input').val($(this).attr('name'));
});