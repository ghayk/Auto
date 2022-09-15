export default class UiHelper {

    setValues(params) {
        this.setValueById('#select-brand', params['brand'])
        this.setValueById('#select-year', params['year'])
        this.setValueById('#select-color', params['color'])
        this.setValueById('#select-motor', params['motor'])
        document.querySelector('#select-id').value = params['id']
    }

    setValueById(elementId, value) {
        document.querySelector(elementId).querySelectorAll('option').forEach(el => {
            if ('' + el.value === value + '') {
                el.selected = true
            }
        })
    }

    openModal(type) {
        if (type === 'add') {
            document.querySelector(".form-title").innerHTML = "Add new car";
            document.querySelector(".save-btn").value = "add";
        } else if (type === 'update') {
            document.querySelector(".form-title").innerHTML = "Update new car";
            document.querySelector(".save-btn").value = "update";
        }

        document.querySelector('.form-container').classList.add('active')
    }

    closeModal() {
        document.querySelector('.form-container').classList.remove('active')

        this.setValues({
            'brand': '',
            'year': '',
            'color': '',
            'motor': ''
        })

        document.querySelector('#select-id').value = ''

        document.querySelector('#select-brand').style.outline = 'none'
        document.querySelector('#select-year').style.outline = 'none'
        document.querySelector('#select-color').style.outline = 'none'
        document.querySelector('#select-motor').style.outline = 'none'
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
}
