import Vue from 'vue'
import Swiper from 'swiper'
import {baseConfig, baseState, baseActions} from '../app'
import {store} from '../store'

const _404 = new Vue({
  ...baseConfig(store),
  data() {
    return {
      //Form Base
      form: {
        status: 0
      },

      //Form Model
      firstname: {
        value: '',
        pattern: "^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$",
        isValid: ''
      },
      lastname: {
        value: '',
        pattern: "^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$",
        isValid: ''
      },
      email: {
        value: '',
        pattern: "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$",
        isValid: ''
      },
      buy_date: {
        value: '',
        pattern: "^[0-9]+[\/-][0-9]+[\/-][0-9]+$",
        isValid: ''
      },
      shop: {
        value: '',
        isValid: ''
      },
      country: {
        value: '',
        isValid: ''
      },
      serie: {
        value: '',
        pattern: '^[0-9a-zA-Z]+$',
        isValid: ''
      },
      invoice_number: {
        value: '',
        pattern: '^[0-9]+$',
        isValid: ''
      },
      invoice_file: '',
      terms: false
    }
  },
  computed: {
    ...baseState()
  },
  watch: {
    'firstname.value': function(){
      this.firstname.isValid = this.validateText(this.firstname)
    },
    'lastname.value': function(){
      this.lastname.isValid = this.validateText(this.lastname)
    },
    'email.value': function(){
      this.email.isValid = this.validateText(this.email)
    },
    'buy_date.value': function(){
      this.buy_date.isValid = this.validateText(this.buy_date)
    },
    'shop.value': function(){
      this.validateSelect(this.shop)
    },
    'country.value': function(){
      this.validateSelect(this.country)
    },
    'serie.value': function(){
      this.serie.isValid = this.validateText(this.serie)
    },
    'invoice_number.value': function(){
      this.invoice_number.isValid = this.validateText(this.invoice_number)
    },
  },
  mounted(){
    this.initSwiper()

    var shop = this.shop,
      country = this.country

    $('.input_container').on('click', '.body_select_option', function(){
      let val = $(this).attr('data-val')
      let text = $(this).text()

      $(this).parent().parent().find('select').val(val)

      if ($(this).parent().parent().find('select').attr('id') == "shop") {      
        shop.value = val;
      } else {
        country.value = val;        
      }

      $(this).parent().parent().find('.head_select').text(text)
    })   
  },
  methods: {
    ...baseActions(),
    initSwiper: function(){
      let slider = new Swiper('#slider-banner', {
        pagination: {
          el: '.swiper-pagination'
        }
      }); 
    },
    validateText: function(parameter){
      let input_pattern = new RegExp( parameter.pattern ),
        input_value = parameter.value.trim()

      if(input_pattern.test(input_value)){
        if(parameter.isValid == null || parameter.isValid == false){
          this.form.status++;
        }
        return true;
      }else{
        if(parameter.isValid == null || parameter.isValid == true){
          this.form.status--;
        }
        return false
      }
    },
    validateSelect: function(parameter){
      if(parameter.value != '' && parameter.isValid == false){
        parameter.isValid = true
        this.form.status++;
      }
    },    
    changeInvoiceFile: function(event){
      this.invoice_file = event.target.files[0]
      this.form.status++;
    },
    sendRedemption: function(){
      event.preventDefault()

      let form_data = new FormData();
      form_data.append('firstname', this.firstname.value)
      form_data.append('lastname', this.lastname.value)
      form_data.append('email', this.email.value)
      form_data.append('buy_date', this.buy_date.value)
      form_data.append('shop', this.shop.value)
      form_data.append('country', this.country.value)
      form_data.append('serie', this.serie.value)
      form_data.append('invoice_number', this.invoice_number.value)
      form_data.append('invoice_file', this.invoice_file)
      form_data.append('g-recaptcha-response', grecaptcha.getResponse())

      fetch(`${this.API}/redemption`,{
          method: 'POST',
          body: form_data
        })
        .then(res => {
          if (res.status >= 200 && res.status < 300) {
            return res.json()
          }else{
            throw res
          }
        })
        .then(redemption => {
          alert(redemption)
        })
        .catch(err => {
          if (err.status == 403) {
            alert('Invalid captcha')
          }
          throw err;          
        })

    }
  }
})
