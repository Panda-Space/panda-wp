import Vue from 'vue'
import Swiper from 'swiper'
import {baseConfig, baseState, baseActions} from '../app'
import {validateText, validateSelect, getDepartmentos, getProvincias, getDistritos} from '../libs/form';
import {store} from '../store'

const home = new Vue({
  ...baseConfig(store),
  data() {
    return {
      departamentos: getDepartmentos(),
      provincias: [],
      distritos: [],

      participant: {
        state: 0,
        sent: false,
        isLoading: false,
        values: {
          firstname: {
            value: '',
            pattern: "^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$",
            isValid: false
          },
          lastname: {
            value: '',
            pattern: "^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$",
            isValid: false
          },
          dni: {
            value: '',
            pattern: '^[0-9]+$',
            isValid: false
          },   
          mobile: {
            value: '',
            pattern: '^[0-9a-zA-Z]+$',
            isValid: false
          },
          mobileOperator: {
            value: '',
            isValid: false
          },
          mobileModality: {
            value: '',
            isValid: false
          },
          email: {
            value: '',
            pattern: "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$",
            isValid: false
          },
          department: {
            value: '',
            isValid: false
          },
          district: {
            value: '',
            isValid: false
          },
          province: {
            value: '',
            isValid: false
          },
          dateBuy: {
            value: '',
            isValid: false
          },
          product: {
            value: '',
            isValid: false
          },
          invoiceFile: {
            name: '',
            value: '',
            isValid: false
          },
          terms: false,
          politics: false,
        }
      },    
    }
  },
  computed: {
    ...baseState(),
  },
  watch: {
    'participant.values.firstname.value': function(){
      this.participant.values.firstname.isValid = this.validateText(this.participant.values.firstname);
    },
    'participant.values.lastname.value': function(){
      this.participant.values.lastname.isValid = this.validateText(this.participant.values.lastname);
    },
    'participant.values.dni.value': function(){
      this.participant.values.dni.isValid = this.validateText(this.participant.values.dni);
    },
    'participant.values.email.value': function(){
      this.participant.values.email.isValid = this.validateText(this.participant.values.email);
    },
    'participant.values.mobile.value': function(){
      this.participant.values.mobile.isValid = this.validateText(this.participant.values.mobile);
    },
    'participant.values.mobileOperator.value': function(){
      this.validateSelect(this.participant.values.mobileOperator);
    },
    'participant.values.mobileModality.value': function(){
      this.validateSelect(this.participant.values.mobileModality);
    },
    'participant.values.department.value': function(){
      this.validateSelect(this.participant.values.department);
    },
    'participant.values.province.value': function(){
      this.validateSelect(this.participant.values.province);
    },
    'participant.values.district.value': function(){
      this.validateSelect(this.participant.values.district);
    },
    'participant.values.dateBuy.value': function(){
      this.participant.values.dateBuy.isValid = this.validateText(this.participant.values.dateBuy);
    },
    'participant.values.product.value': function(){
      this.validateSelect(this.participant.values.product);
    },
  },
  mounted() {
    setTimeout(function(){
      new Swiper('.swiper-container', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }
      });
    },50) 
    ;
  },
  methods: {
    ...baseActions(),
    validateText,
    validateSelect,
    getProvincias,
    getDistritos,
    isWrongField: function(field, multiple = true) {
      if (multiple) {
        return this.participant.state && !this.participant.values[field].isValid;
      } else {
        return this.participant.state && !this.participant.values[field];
      }
    },
    changeInvoiceFile: function(event){
      this.participant.values.invoiceFile.value   = event.target.files[0]
      this.participant.values.invoiceFile.isValid = true;
      this.participant.values.invoiceFile.name    = event.target.files[0].name
    },
    saveParticipant: function(e) {
      e.preventDefault();

      this.participant.state = 1;

      const validParticipant = (Object.values(this.participant.values).filter(e => {
        if (e.value) {
          return !e.isValid
        } else {
          return !e
        }
      }).length == 0)

      if(validParticipant){
        this.participant.isLoading = true;

        let formData = new FormData();

        for (const [key, element] of Object.entries(this.participant.values)) {
          formData.append(key, element.value)
        }

        fetch(`${this.API}/participants`,{
          method: 'POST',
          body: formData
        })
        .then(res => {
          if (res.status >= 200 && res.status < 300) {
            alert('Registro exitoso');

            this.participant.sent       = 1;
            this.participant.isLoading  = false;
          }else{
            throw res
          }
        })
        .catch(err => {
          alert('Error inesperado');

          throw err;
        })
        .finally(() => {
          this.participant.isLoading = false;
        })
      }
    },
    resetParticipant: function() {
      if(this.participant.sent == 1) {
        Object.values(this.participant.values).forEach(el => {
          if(el.value) el.value = '';
          if(el.isValid) el.isValid = false;
        })

        this.participant.state                    = 0;
        this.participant.sent                     = 0;
        this.participant.values.terms             = false;
        this.participant.values.politics          = false;
        this.participant.values.invoiceFile.name  = '';
      }
    },
  }
})
