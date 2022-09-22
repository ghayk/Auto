export default class ModalUiHelper {

    open(type) {
        if (type === 'add') {
            document.querySelector(".form-title").innerHTML = "Add new car";
            document.querySelector(".save-btn").style.display = "block";
        } else if (type === 'update') {
            document.querySelector(".form-title").innerHTML = "Update car";
            document.querySelector(".update-btn").style.display = "block";
        }

        document.querySelector('.form-container').classList.add('active')
    }

    close() {
        const modal = document.querySelector('.form-container');

        modal.classList.remove('active')

        modal.querySelector(".update-btn").style.display = "none";
        modal.querySelector(".save-btn").style.display = "none";

        modal.querySelector('#select-brand').value = ''
        modal.querySelector('#select-year').value = ''
        modal.querySelector('#select-color').value = ''
        modal.querySelector('#select-motor').value = ''
        modal.querySelector('#select-id').value = ''

        modal.querySelector('#select-brand').style.outline = 'none'
        modal.querySelector('#select-year').style.outline = 'none'
        modal.querySelector('#select-color').style.outline = 'none'
        modal.querySelector('#select-motor').style.outline = 'none'
    }

    setError() {
        const brand = document.querySelector('#select-brand');
        const year = document.querySelector('#select-year');
        const color = document.querySelector('#select-color');
        const motor = document.querySelector('#select-motor');

        const outline = '2px solid red'
        const none = 'none'

        if (brand.value) {
            brand.style.outline = none
        } else {
            brand.style.outline = outline
        }
        if (year.value) {
            year.style.outline = none
        } else {
            year.style.outline = outline
        }
        if (color.value) {
            color.style.outline = none
        } else {
            color.style.outline = outline
        }
        if (motor.value) {
            motor.style.outline = none
        } else {
            motor.style.outline = outline
        }
    }

    setOptions(selectId, params) {
        params.forEach(item => {
            const title = item['title']
            const el = `<option value="${title}">${title}</option>`
            document.querySelector(selectId).innerHTML += el;
        })
    }
}