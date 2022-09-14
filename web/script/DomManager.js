import DataManager from "./DataManager.js";

export default class DomManager {

    setValueById(elementId, value) {
        document.querySelector(elementId).querySelectorAll('option').forEach(el => {
            if ('' + el.value === value + '') {
                el.selected = true
            }
        })
    }

    setOptions(elementId, dataType, searchText = '') {
        const requestUrl = `classes/actions/searchAction.php?search=${searchText}&dataType=${dataType}`
        const data = new DataManager().getData(requestUrl);

        data.then(brands => {
            brands.forEach(brand => {
                const brandName = brand['title']
                const el = `<option value="${brandName}">${brandName}</option>`
                document.querySelector(elementId).innerHTML += el;
            })

        })
    }

    openModal() {
        document.querySelector('.form-container').classList.add('active')
    }

    closeModal() {
        document.querySelector('.form-container').classList.remove('active')


        this.setValueById('#select-brand', '')
        this.setValueById('#select-year', '')
        this.setValueById('#select-color', '')
        this.setValueById('#select-motor', '')

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
