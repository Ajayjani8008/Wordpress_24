jQuery(document).ready(function($) {
    var page = 1;
    var loading = false;
    var $loadMoreButton = $('.load-more-comments');

    $loadMoreButton.on('click', function(e) {
        e.preventDefault();
        if (!loading) {
            loading = true;
            var data = {
                action: 'load_more_comments',
                page: page,
                post_id: ajax_comments_params.post_id,
            };

            $.ajax({
                type: 'POST',
                url: ajax_comments_params.ajax_url,
                data: data,
                success: function(response) {
                    $('.comment-lists').append(response);
                    // If response contains comments, increment page
                    if (response.trim().length > 0) {
                        page++;
                    } else {
                        // Hide the load more button if no more comments
                        $loadMoreButton.hide();
                    }
                    loading = false;
                }
            });
        }
    });
});
