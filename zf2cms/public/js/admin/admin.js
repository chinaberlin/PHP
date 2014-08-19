(function ($) {

    $(function () {

        /**
         * 表单的多选
         */
        $('input[type=checkbox][name=delete-all]').on('change', function () {

            var allCheckbox = $('input[type=checkbox][name=delete-all]');

            var index = allCheckbox.index(this);

            if (index === 0) {
                if ($(this).prop('checked')) {
                    allCheckbox.prop('checked', true);
                } else {
                    allCheckbox.prop('checked', false);
                }
            } else {
                if (!$(this).prop('checked')) {
                    allCheckbox.eq(0).prop('checked', false);
                }
            }

            if (
                $('input[type=checkbox][name=delete-all]:checked').length
                    ===
                ($('input[type=checkbox][name=delete-all]').length - 1)
                ) {
                allCheckbox.prop('checked', true);
            }

            if ($('input[type=checkbox][name=delete-all]:checked').length > 0) {
                $('.delete-all').removeAttr('disabled');
            } else {
                $('.delete-all').attr('disabled', true);
            }

        });

        $('body').on('click', '.delete-all', function (e) {
            e.preventDefault();

            var ids = [];

            $('input[type=checkbox][name=delete-all]:not(:eq(0)):checked').each(function () {
                ids.push($(this).val());
            });

            var href = $(this).attr('href');

            location.href = href + '?id=' + ids.join(',');
        });


    });

})(jQuery);