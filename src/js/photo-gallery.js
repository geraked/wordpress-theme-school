$(document).ready(function(){        
	$('li img').on('click',function(){
		var src = $(this).attr('src');
		var img = '<img src="' + src + '" class="img-responsive"/>';
		
		//start of new code new code
		var index = $(this).parent('li').index();   
		
		var html = '';
		html += img;                
		html += '<div class="row controls">';
		html += '<div class="col-md-6 col-xs-6 text-left"><a class="previous btn btn-default btn-xs" href="' + (index) + '">&laquo; قبلی</a></div>';
		html += '<div class="col-md-6 col-xs-6"><a class="next btn btn-default btn-xs" role="button" href="'+ (index+2) + '">بعدی &raquo;</a></div>';
		html += '</div>';
		
		$('.photo-gallery #myModal').modal();
		$('.photo-gallery #myModal').on('shown.bs.modal', function(){
			$('.photo-gallery #myModal .modal-body').html(html);
			//new code
			$('.photo-gallery .controls a').trigger('click');
		})
		$('.photo-gallery #myModal').on('hidden.bs.modal', function(){
			$('.photo-gallery #myModal .modal-body').html('');
		});
		
		
		
		
   });	
})
        
         
$(document).on('click', '.photo-gallery .controls a', function(){
	var index = $(this).attr('href');
	var src = $('.photo-gallery ul.row li:nth-child('+ index +') img').attr('src');             
	
	$('.photo-gallery .modal-body img').attr('src', src);
	
	var newPrevIndex = parseInt(index) - 1; 
	var newNextIndex = parseInt(newPrevIndex) + 2; 
	
	if($(this).hasClass('previous')){               
		$(this).attr('href', newPrevIndex); 
		$('.photo-gallery a.next').attr('href', newNextIndex);
	}else{
		$(this).attr('href', newNextIndex); 
		$('.photo-gallery a.previous').attr('href', newPrevIndex);
	}
	
	var total = $('ul.row li').length + 1; 
	//hide next button
	if(total === newNextIndex){
		$('.photo-gallery a.next').hide();
	}else{
		$('.photo-gallery a.next').show()
	}            
	//hide previous button
	if(newPrevIndex === 0){
		$('.photo-gallery a.previous').hide();
	}else{
		$('.photo-gallery a.previous').show()
	}
	
	
	return false;
});