(function ($) {
// Prefill the search box with Search... text.
	Drupal.behaviors.drupaldeveloper = {
	  attach: function (context) {
		
		$(document).ready(function(e) {
            $('#searchNow2').click(function(e){
                e.preventDefault();
                var href=$(this).attr('href');
                var search=$('#searchVal2').val();
                //onsole.log(href+search);
                window.location=href+search;
            })
            $('#searchNow').click(function(e){
                e.preventDefault();
                var href=$(this).attr('href');
                var search=$('#searchVal').val();
                window.location=href+search;
            })
            $('.form-type-radio.form-item-line-item-fields-commerce-donate-amount-und-select').click(function(e){
               // var pid=$(this).attr('rel');
                //console.log(pid);
                $('.form-type-radio.form-item-line-item-fields-commerce-donate-amount-und-select').removeClass('active');
                $(this).addClass('active');
                //$('input.commerce-quick-purchase__sku').val(pid);
               
            })
            $('.tablinkmember').click(function(e){
                var itm=$(this).data('itm');
                if(itm==5){
                    $('.tab-next.w-button').fadeOut(0);
                }else{
                     $('.tab-next.w-button').fadeIn(0);
                }
            })
            $('.tab-next.w-button').click(function(e){
                var active=$('.tablinkmember.w--current').data('itm');
                active++;
                $('.tablinkmember.w--current').removeClass('w--current');
                $('.w-tab-pane.w--tab-active').removeClass('w--tab-active');
                $('.tablinkmember.b'+active).addClass('w--current');
                $('.w-tab-pane.t'+active).addClass('w--tab-active');
                if(active==5){
                    $('.tab-next.w-button').fadeOut(0);
                }
                //console.log(active);
            })
            if($('#block-mailchimp-signup-quarterly-newsletter-')[0]){
                $('#block-mailchimp-signup-quarterly-newsletter- input.form-text').addClass('text-field-2 w-input');
                $('#block-mailchimp-signup-quarterly-newsletter- input#edit-submit').addClass('submit-button w-button');
            }
            if($('.donatedrop.page')[0]){
                $('.w-tab-link').click(function(e){
                    var itm=$(this).attr('data-item')
                    $('.w-tab-link.w--current.'+itm).removeClass('w--current');
                    $(this).addClass('w--current');
                    var rel=$(this).attr('data-w-tab')
                    $('.w-tab-pane.w--tab-active.'+itm).removeClass('w--tab-active');
                    $('.w-tab-pane[data-w-tab="'+rel+'"].'+itm).addClass('w--tab-active');
                    
                })
            }
			if($('#searchBox')[0]){
                $('.nodeTypex').click(function(e){
                    $('.nodeTypex.current').removeClass('current');
                    $(this).toggleClass('current');            
                })
                $('.termTag').click(function(e){
                    $('.tag.all').removeClass('current');
                    $(this).toggleClass('current');            
                })
                $('#reset').click(function(e){
                    $('.nodeTypex.current').removeClass('current');
                    $('.termTag.current').removeClass('current');
                    $('.tag.all').addClass('current');
                    $('#searchVal').val('');
                })
                $('#search').click(function(e){
                    e.preventDefault();
                    var href=$(this).attr('href');
                    var search=$('#searchVal').val();
                    var noR=true;
                    if($('.nodeTypex.current')[0]){
                        search+=' '+$('.nodeTypex.current').attr('rel');
                        if($('.nodeTypex.current').attr('rel')=='type:news term:16'){
                            noR=false;
                        }
                    }
                    if($('.termTag.current')[0]){
                        if(noR){
                            search+=' term:';
                        }else{
                            search+=',';
                        }
                        $('.termTag.current').each(function(){
                            search+=''+$(this).attr('rel')+',';
                        })
                    }
                     //console.log(href+search);
                   window.location=href+search;
                })
            }
        });
			
	  }
	};
})(jQuery);

