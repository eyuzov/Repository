'use strict';

// Код валидации формы
function validateForm(obj) {
  var count = 0;
  var form = document.getElementById(obj.formId);
  form.addEventListener('click', (e) => addListener(e.target));
  form.addEventListener('submit', (e) => checkForm(e));

  function checkForm(e) {
    e.preventDefault();
    let onOffInvalidClassForm = 0;
    for (var i = 0; i < e.target.elements.length; i++) {
      if (e.target.elements[i].tagName == 'INPUT') {
        onOffInvalidClassForm += validate(e.target.elements[i], count)
      }
    }
    if (onOffInvalidClassForm > 0) {
      form.classList.add(obj.formInvalidClass);
    } else {
      form.classList.remove(obj.formInvalidClass);
      form.classList.add(obj.formValidClass);
    }
  }

  function addListener(input) {
    if (input.tagName == 'INPUT') {
      if (input.classList.contains(obj.inputErrorClass) == 1) {
        input.classList.remove(obj.inputErrorClass)
      }
      input.addEventListener('blur', (e) => validate(e.target));
    }
  }

  function validate(elem, count) {

    if (elem.dataset.hasOwnProperty('required')) {
      count += req(elem);
    }
    if (elem.dataset.validator == 'number') {
      count += validNumber(elem)
    }
    if (elem.dataset.validator == 'letters') {
      count += validLetters(elem)
    }
    if (elem.dataset.validator == 'regexp') {
      count += validRegexp(elem)
    }
    return count;
  }

  function validRegexp(elem) {
    let reg = /^\+7\d{10}$/;
    if (reg.test(elem.value) == 0 && elem.value !== '') {
      elem.classList.add(obj.inputErrorClass);
      return 1;
    }
    return 0;
  }

  function validLetters(elem) {
    let reg = /^[A-zА-я]+$/;
    if (reg.test(elem.value) == 0) {
      elem.classList.add(obj.inputErrorClass);
      return 1;
    }
    return 0;
  }


  function validNumber(elem) {
    if (isNaN(elem.value) || elem.value < +elem.dataset.validatorMin || elem.value > +elem.dataset.validatorMax) {
      elem.classList.add(obj.inputErrorClass);
      return 1;
    }
    return 0;
  }

  function req(elem) {
    if (elem.value == '') {
      elem.classList.add(obj.inputErrorClass);
      return 1;
    }
    return 0;
  }

}
