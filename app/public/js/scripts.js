
jQuery(document).ready(function() {

    $('.js-training-form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    $("input[name^='exercises']").click(function () {
        $(this).select();
    });

    var $addCommentLink = $('.training-add-action-btn');

    $addCommentLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        var exercise = $(e.target).attr('data-id');

        var $collectionHolder = $('#exercises-' + exercise);

        $collectionHolder.data('index', $collectionHolder.find($('div[id^="actions"]')).length);
        var action = $collectionHolder.data('index');

        var $insertedForm = $('' +
            '    <tr id="actions-' + action + '">\n' +
            '        <td></td>' +
            '        <td>\n' +
            '            <input class="form-control" required="" name="exercises[' + exercise + '][actions][' + action + '][accesses]" type="text" value="0">\n' +
            '        </td>\n' +
            '        <td>\n' +
            '            <input class="form-control" required="" name="exercises[' + exercise + '][actions][' + action + '][repetitions]" type="text" value="0">\n' +
            '        </td>\n' +
            '        <td>\n' +
            '            <input class="form-control" required="" name="exercises[' + exercise + '][actions][' + action + '][weight]" type="text" value="0">\n' +
            '        </td>\n' +
            '    </tr>');

        $insertedForm.insertBefore('#last-' + exercise);
        // add a new tag form (see code block below)
        //addTagForm($collectionHolder);
    });


});

function addTagForm($collectionHolder) {



    // handle the removal, just for this example
    $('.remove-tag').click(function(e) {
        e.preventDefault();

        $(this).parent().remove();

        return false;
    });
}