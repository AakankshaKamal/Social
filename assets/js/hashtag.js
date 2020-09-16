$(function(){
	var regex=/[#|@](\w+)$/ig;
	$(document).on('keyup','.status',function(){
		var max=140;
		var content =$.trim($(this).val());
			$('#count').text(max - content.length);
		var text= content.match(regex);
		
		if(text !=null)
		{
			var dataString='hashtag='+text;


			$.ajax({
				type:"POST",
				url:"http://localhost/twitter/core/ajax/getHashtag.php",
				data:dataString,
				cache:false,
				success:function(data){
					$('.hash-box ul').html(data);
					$('.hash-box li').click(function(){
 var value=$.trim($(this).find('.getValue').text());
 var oldContent=$('.status').val();
 var newContent=oldContent.replace(regex,"");
 $('.status').val(newContent+value+' ');
 $('.hash-box li').hide();
 $('.status').focus();



					});
					
				}
			});
			 
		}//not working length part
		else
		{
			$('.hash-box li').hide();
		}
		if(content.length === max)
		{
			$('#count').css('color','#DD2');

		}
		else
		{
			$('#count').css('color','#2D4');
		}

	});
});