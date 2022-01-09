/**
 * Pagination product
 */
(function ($) {
    "use strict";

    let paged = 1;

    $('.load-my-product').on('click', function (e) {
        e.preventDefault();

        const thisEvent = $(this);
        const btn_link = thisEvent.closest('.btn-link');
        const hasActive = btn_link.hasClass('active-load');

        if ( !hasActive ) {
            const options = thisEvent.data('settings');
            paged +=1;

            btn_link.addClass('active-load');

            $.ajax({
                url: design_get_product .url,
                type: 'POST',
                data: ({
                    action: 'design_load_item_product',
                    options: options,
                    paged: paged
                }),

                success: function (data) {
                    if (data) {
                        $('.element-student-product-grid .row').append(data).show();
                    } else {
                        btn_link.remove();
                    }
                },

                complete: function () {
                    setTimeout(function() {
                        btn_link.removeClass('active-load');
                    }, 1000);
                }
            });
        }
    })

})(jQuery);