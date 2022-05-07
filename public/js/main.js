
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        // $('#blah').css('display','none')
        reader.onload = function (e) {
            if(input.files[0])
            {
                $('#blah')
                .css('display','block')
                .attr('src', e.target.result)
                .width(365)
                .height(445);
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// disabled button add post
let text = document.getElementById('text');
let submit = document.getElementById('submit');
text.addEventListener('input',(event)=>{
   if(event.target.value.length > 0)
   {
    submit.disabled = false;
   }
   else{
    submit.disabled = true;
   }
//    else{
//     submit.disabled = false;
//    }
})

// foreach exist button clicked

$('.toggle-button').each(function() {

 if($(this).hasClass('is-liked'))
 {
  $(this).find('#icon_heart_white').css('display','block');
  $(this).find('#icon_heart_red').css('display','none');
 }
 else{
  $(this).find('#icon_heart_white').css('display','none');
  $(this).find('#icon_heart_red').css('display','block');
 }
  
})    

// click button
$('.toggle-button').click(function() {
  // $(this).find('#countLike').text(0);
  $(this).toggleClass('is-liked');
    if($(this).hasClass('is-liked'))
    {
      $(this).find('#icon_heart_white').css('display','block');
      $(this).find('#icon_heart_red').css('display','none');
      $(this).find('#countLike').text(parseInt($(this).find('#countLike').text()) - 1 );
      $.ajax({ 
        type: "GET", 
        dataType: "json", 
        url: '/post/unlikePost', 
        data: {'post_id': $(this).data('id')}, 
        success: function(data){ 
        console.log(data) 
     } 
  }); 
    }
    else{
      $(this).find('#icon_heart_white').css('display','none');
      $(this).find('#icon_heart_red').css('display','block');
      $(this).find('#countLike').text(parseInt($(this).find('#countLike').text()) + 1 );
  $.ajax({ 
    type: "GET", 
    dataType: "json", 
    url: '/post/likePost', 
    data: {'post_id': $(this).data('id')}, 
    success: function(data){ 
    console.log(data.success) 
 } 
}); 
    } 
})

 function fromNow(date) {
  const SECOND = 1000;
  const MINUTE = 60 * SECOND;
  const HOUR = 60 * MINUTE;
  const DAY = 24 * HOUR;
  const WEEK = 7 * DAY;
  const MONTH = 30 * DAY;
  const YEAR = 365 * DAY;
  const units = [
      { max: 30 * SECOND, divisor: 1, past1: 'just now', pastN: 'just now', future1: 'just now', futureN: 'just now' },
      { max: MINUTE, divisor: SECOND, past1: 'a second ago', pastN: '# seconds ago', future1: 'in a second', futureN: 'in # seconds' },
      { max: HOUR, divisor: MINUTE, past1: 'a minute ago', pastN: '# minutes ago', future1: 'in a minute', futureN: 'in # minutes' },
      { max: DAY, divisor: HOUR, past1: 'an hour ago', pastN: '# hours ago', future1: 'in an hour', futureN: 'in # hours' },
      { max: WEEK, divisor: DAY, past1: 'yesterday', pastN: '# days ago', future1: 'tomorrow', futureN: 'in # days' },
      { max: 4 * WEEK, divisor: WEEK, past1: 'last week', pastN: '# weeks ago', future1: 'in a week', futureN: 'in # weeks' },
      { max: YEAR, divisor: MONTH, past1: 'last month', pastN: '# months ago', future1: 'in a month', futureN: 'in # months' },
      { max: 100 * YEAR, divisor: YEAR, past1: 'last year', pastN: '# years ago', future1: 'in a year', futureN: 'in # years' },
      { max: 1000 * YEAR, divisor: 100 * YEAR, past1: 'last century', pastN: '# centuries ago', future1: 'in a century', futureN: 'in # centuries' },
      { max: Infinity, divisor: 1000 * YEAR, past1: 'last millennium', pastN: '# millennia ago', future1: 'in a millennium', futureN: 'in # millennia' },
  ];
  const diff = Date.now() - (typeof date === 'object' ? date : new Date(date)).getTime();
  const diffAbs = Math.abs(diff);
  for (const unit of units) {
      if (diffAbs < unit.max) {
          const isFuture = diff < 0;
          const x = Math.round(Math.abs(diff) / unit.divisor);
          if (x <= 1) return isFuture ? unit.future1 : unit.past1;
          return (isFuture ? unit.futureN : unit.pastN).replace('#', x);
      }
  }
};

 $('.comment_container').each(function () {
  $(this).find('#send_comment').click(function() {
    // console.log($('.comment_container'));
    let _token   = $('meta[name="csrf-token"]').attr('content');
    var source = $("#demo_handlebar").html();
    // console.log(source);
    var comment_user = {
      comment_des : $('#textComment').val()
    }
    // console.log("Hello");
    var template = Handlebars.compile(source);
    // console.log($(this).parent().find('#textComment').val());
    $(this).parent().find('#textComment').val()
    let parentComment = $(this).parent().parent().find("#comment_list");
    let textComment = $(this).parent().find('#textComment').val();
    let CommentZero = $(this).parent().find('#textComment').val('');
    let ImageUser = $(this).data('image');
    let ImageStorage = `storage/image/${ImageUser}`;
    let Username = $(this).data('username');
    let post_id = parentComment.find("#editComment").data("postid");
    let user_id = parentComment.find("#editComment").data("userid");
    let comment_id = parentComment.find("#editComment").data("idcomment");
    if(textComment.length > 0)
    {
      $.ajax({ 
        type: "POST", 
        dataType: "json", 
        url: '/post/comment', 
        data: {post_id: $(this).data('id'),content:textComment,_token: _token}, 
        success: function(data){ 
             parentComment.append(
              template({ImageUser:ImageUser,post_id:post_id,
                user_id:user_id,comment_id:comment_id,textComment: textComment, 
                Username:Username,date:fromNow(Date.now()),ImageUser:ImageStorage})
            )
              CommentZero;
             
        },
        error: function(error) {
          console.log(error);
         }
    });
    }
    else{
      alert("Ban chua dien comment");
    }
  
   })
})
// click comment

// $('.comment_items').each(function () {
//  $(this).on("click", function () {
//   // $(this).find("#comment_des").css('display','none');
//   // $(this).find("#editComment").css('display','block');
//  })


// //  })

//  var source = $("#comment_edit").html();
//  var time_comment = $("#time_comment_handlebar").html();
//  var templateEditcomment = Handlebars.compile(source);
//  var templateTimecomment = Handlebars.compile(time_comment);
//  $(this).find("#editComment").each(function () {
//   // console.log($(this));

//   let _token   = $('meta[name="csrf-token"]').attr('content');
//      let postid = $(this).data("postid");
//      let userid = $(this).data("userid");
//      let commentid = $(this).data("idcomment");
     
//     $(this).keyup(function (e) {
//       let textComment = $(this).val();
//       let  comment_text= $(this).parent().parent().find(".comment_text")
//       let  time_comment_html= $(this).parent().parent().find(".time_comment")
//       if(e.keyCode == 13) 
//       {
//         $(this).parent().parent().find("#comment_des").css('display','block');
//         $(this).parent().parent().find("#editComment").css('display','none');
        
//         $.ajax({ 
//           type: "PUT", 
//           dataType: "json", 
//           url: '/post/editComment', 
//           data: {post_id: postid,user_id:userid,content:textComment,comment_id:commentid,_token: _token}, 
//           success: function(data){ 
//             console.log(data);
//               comment_text.html(
//                 templateEditcomment({content: textComment})
//               )
//               time_comment_html.html(
//                 templateTimecomment()
//               )
//           },
//           error: function(error) {
//             console.log(error);
//            }
//       });

//       }
//     })
//  })

// })


$(document).on("click", ".edit", function () {
     $(this).parentsUntil('.post-actions').find("#comment_des").css('display','none');
     $(this).parentsUntil('.post-actions').find("#editComment").css('display','block');
      var source = $("#comment_edit").html();
      var time_comment = $("#time_comment_handlebar").html();
      var templateEditcomment = Handlebars.compile(source);
      var templateTimecomment = Handlebars.compile(time_comment);
      $(this).parentsUntil('.post-actions').find("#editComment").keyup(function (e) {
        let textComment = $(this).val();
        let  comment_text= $(this).parentsUntil('.post-actions').find(".comment_text")
        let  time_comment_html= $(this).parentsUntil('.post-actions').find(".time_comment")
        let data_text = $(this).parentsUntil('.post-actions').find("#editComment").val()
        // let post_id = $(this).parentsUntil('.post-actions').find("#editComment").data("postid");
        // let user_id = $(this).parent().parent().find("#editComment").data("userid");
        let comment_id = $(this).parentsUntil('.post-actions').find("#editComment").data("idcomment");
        let _token   = $('meta[name="csrf-token"]').attr('content');
        if(e.keyCode == 13) 
        {
          $(this).parentsUntil('.post-actions').find("#comment_des").css('display','block');
          $(this).parentsUntil('.post-actions').find("#editComment").css('display','none');
          if(data_text.length > 0) {
            $.ajax({ 
              type: "PUT", 
              dataType: "json", 
              url: '/post/editComment', 
              data: {content:data_text,comment_id:comment_id,_token: _token}, 
              success: function(data){ 
                console.log(data);
                  comment_text.html(
                    templateEditcomment({content: data_text})
                  )
                  time_comment_html.html(
                    templateTimecomment()
                  )
              },
              error: function(error) {
                console.log(error);
               }
          });
          }
          else{
            alert("Ban chua dien comment");
          }
        }
      })
})

// $("#delete-post").click(function() {
//   //  console.log($(this).parentsUntil('.grid-margin'));
//   let _token   = $('meta[name="csrf-token"]').attr('content');
//   // console.log($(this).parent().parent().parent().parent().parent().parent());
//   if(confirm('do you want to delete this post?'))
//   {
//     $(this).parentsUntil('.grid-margin').remove();
//     $.ajax({ 
//       type: "DELETE", 
//       dataType: "json", 
//       url: '/post/delete', 
//       data: {post_id:$(this).data('postid'),_token: _token}, 
//       success: function(data){ 
//         console.log(data);
//       },
//       error: function(error) {
//         console.log(error);
//        }
//   });
//   }
// });
$(document).on("click", "#delete-post", function () {
  let _token   = $('meta[name="csrf-token"]').attr('content');
  // console.log($(this).parent().parent().parent().parent().parent().parent());
  if(confirm('do you want to delete this post?'))
  {
    $(this).parentsUntil('.grid-margin').remove();
    $.ajax({ 
      type: "DELETE", 
      dataType:"json", 
      url: '/post/delete', 
      data: {post_id:$(this).data('postid'),_token: _token}, 
      success: function(data){ 
        console.log(data);
      },
      error: function(error) {
        console.log(error);
       }
  });
  }
})



$(document).on("click", "#delete-comment", function () {
  let _token   = $('meta[name="csrf-token"]').attr('content');
  if(confirm('do you want to delete this comment?'))
  {
    $(this).parentsUntil('.post-actions').remove();
    $.ajax({ 
      type: "DELETE", 
      dataType: "json", 
      url: '/post/deleteComment/'+ $(this).data('id'), 
      data: {_token: _token}, 
      success: function(data){ 
        console.log(data);
      },
      error: function(error) {
        console.log(error);
       }
  });
  }
})

$(document).on("click", ".editPost", function () {

  $(this).parentsUntil('.grid-margin').find("#text_post").css('display','none');
  $(this).parentsUntil('.grid-margin').find("#editPost").css('display','block');
  let _token   = $('meta[name="csrf-token"]').attr('content');
  let post_id = $(this).data('postid');
  let edit_post_text = $('#edit_post').html();
  let text_post = $(this).parentsUntil('.grid-margin').find("#text_post");
  var templateEditPost = Handlebars.compile(edit_post_text);
  $(this).parentsUntil('.grid-margin').find("#editPost").on('keyup',function (e) {
    let text =   $(this).parentsUntil('.grid-margin').find("#editPost").val();
    if(e.keyCode == 13) 
    {
      $(this).parentsUntil('.grid-margin').find("#text_post").css('display','block');
      $(this).parentsUntil('.grid-margin').find("#editPost").css('display','none');
      text_post.html(templateEditPost({text:text}))
      $.ajax({ 
        type: "PUT", 
        dataType: "json", 
        url: '/post/editPost/'+ post_id, 
        data: {text:text,_token: _token}, 
        success: function(data){ 
          console.log(data);
        },
        error: function(error) {
          console.log(error);
         }
    });

    }
  })

})

