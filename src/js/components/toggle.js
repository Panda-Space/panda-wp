$('.c-toggle').on('click',function(){
  if($(this).hasClass('c-toggle--active')){

    $(this).removeClass('c-toggle--active');
    $('.c-header-mobile').removeClass('c-header-mobile--visible');

  }else{
    
    $(this).addClass('c-toggle--active');
    $('.c-header-mobile').addClass('c-header-mobile--visible');

  }
})
