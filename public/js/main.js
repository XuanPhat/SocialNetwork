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

const iconHeartWhite = document.getElementsByClassName('icon_heart_white');
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
    // console.log($(this).find('#countLike').text());
   
    // console.log( $(this).data('id'));
   
})


