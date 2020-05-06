$('.burguer_mobile').on('click', function () {
  $(this).toggleClass('open')
  $('.nav_list').toggleClass('open')
})

$('.input_container.file input').on('change', function () {
  var filename = $('input[type=file]').val().split('\\').pop();
  $('.input_container.file .red_span').html(filename)
})

$('.input_container.select').each(function () {
  let that = $(this)
  let cont =0

  $(this).find('select').find('option').each(function (container) {
    cont = cont+1
    let val = $(this).val();
    let text = $(this).text();
    let option = $(`<div class="body_select_option" data-val="${val}">
        ${text}
    </div>`)

    // acomodar la altura del div segun el numero de options que hallan
    that.find('.body_select').css('height',(cont*30)+'px')
    that.find('.body_select').append(option)
  })
})

$('.input_container.select').on('click', function () {
  $(this).find('.body_select').toggleClass('open_select')
})

$(document).on('click', function (e) {
  if ($(e.target).closest(".input_container.select.one").length === 0) {
    $(".input_container.select.one .body_select").removeClass('open_select');
  }
  if ($(e.target).closest(".input_container.select.two").length === 0) {
    $(".input_container.select.two .body_select").removeClass('open_select');
  }
});
