import $ from 'jquery';

let form = {
  sender: $('.c-form__send'),
  state: 0
}

function onInput(input){
  
  let inputValue = (input.val()).trim()

  if(input.attr('pattern')){
    let inputPattern = new RegExp(input.attr('pattern'))

    //validate
    if(inputPattern.test(inputValue)){
      if(input.attr('data-filled') == 0){
        input.attr('data-filled',1)
        form.state += 1   
      }
    }else{
      if(input.attr('data-filled') == 1){
        input.attr('data-filled',0)
        form.state -= 1              
      }
    }
  }else{

    if(inputValue.length !=0){
      if(input.attr('data-filled') == 0){
        input.attr('data-filled',1)
        form.state += 1
      }              
    }else{
      if(input.attr('data-filled') == 1){
        input.attr('data-filled',0)
        form.state -= 1                
      }       
    }
  }

  onFormCheck()
}    

function onFormCheck(){
  if(form.state == 4){
    form.sender.prop('disabled',false);
  }else{
    form.sender.prop('disabled',true);
  }
}

function sendForm(){
  let site_url = $('#app').attr('data-site'),
    data = {
      fullname: $('#user-fullname').val(),
      phone: $('#user-phone').val(),
      email: $('#user-email').val(),
      message: $('#user-message').val()
    }

  $.ajax({
      type: 'POST',
      url: ``,
      data: {
          json: JSON.stringify(data)
      },
      success: (data)=>{
        window.location.href = `${site_url}/contacto`;
      },
      fail: (err)=>{
        console.log("Error:" + err)
      }   
  })
}

//DOM----------------------------------------!!
  $('.c-form__input > input').keyup(function(){
    onInput($(this))
  })

  $('.c-form__input > textarea').keyup(function(){
    onInput($(this))
  })

  $('.c-form__send').click(function(){
    //Apply Loading
    form.sender.html('Enviando...')

    sendForm()
  })
//DOM----------------------------------------!!
