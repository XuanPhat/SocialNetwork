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
