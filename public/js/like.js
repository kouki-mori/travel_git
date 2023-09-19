// // jQueryを使用して非同期リクエストを送信
// $('.like-button').click(function() {
//     const postId = $(this).data('post-id');
//     const likeButton = $(this);

//     $.ajax({
//         url: '/like',
//         type: 'POST',
//         data: {
//             post_id: postId,
//             _token: '{{ csrf_token() }}'
//         },
//         success: function(response) {
//             if (response.action === 'like') {
//                 likeButton.text('Unlike');
//             } else {
//                 likeButton.text('Like');
//             }

//             // いいねのカウントを更新
//             const likeCount = likeButton.siblings('.like-count');
//             likeCount.text(response.likes + ' Likes');
//         },
//         error: function(error) {
//             console.error('エラー:', error);
//         }
//     });
// });

