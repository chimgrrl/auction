$(function() {
    $("input[id^='enabled']").on('click',function(event){
		//console.log(this);
		var id = $(this).val();
		var enabled = 0;		
		
		if($(this).is(':checked'))
		{
			enabled = 1;
		}
		
		$.ajax({
			url: "/auctionapi/web/merchant-brand",
			type: "Put",
			data: {id: id, status: enabled}
		}).done(function(){
			alert("Updated!");
		});
	});
});
