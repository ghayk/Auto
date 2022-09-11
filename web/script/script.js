const wrapper = document.querySelector('.wrapper');
const ACTIONS_DIR = 'classes/actions'

class Car {
    init() {
        window.onload = () => {
            this.getCars('')
            this.setListeners();
            new Modal().setOptionsInModal()
        }
    }

    setListeners() {

        wrapper.querySelector('.dataType').addEventListener('change', () => {
            this.getCars('')
        })

        wrapper.querySelector('.add-btn').addEventListener('click', () => {
            this.addCar()
        })

        wrapper.querySelector('.save-btn').addEventListener('click', () => {
            if (wrapper.querySelector('.save-btn').value === 'add') {
                this.saveCar()
            }
            if (wrapper.querySelector('.save-btn').value === 'update') {
                this.updateCar()
            }
        })

        wrapper.querySelector('.search-car').addEventListener('keyup', () => {
            this.getCars(wrapper.querySelector('.search-car').value.trim())
        })

        wrapper.querySelector('.form-container').addEventListener('click', () => {
            new Modal().closeModal()
        })

        wrapper.querySelector('.cancel-btn').addEventListener('click', () => {
            new Modal().closeModal()
        })

        wrapper.querySelector('.form-car').addEventListener('click', e => {
            e.stopPropagation();
            e.preventDefault()
        })
    }

    getCars(searchText) {
        const dataType = wrapper.querySelector('.dataType').value

        const requestUrl = `${ACTIONS_DIR}/searchAction.php?search=${searchText}&dataType=${dataType}`
        const data = new Data().getData(requestUrl);

        data.then(cars => {
            wrapper.querySelectorAll('.card').forEach(car => {
                if (car.style.display !== 'none') {
                    car.remove();
                }
            })
            cars.forEach(car => {
                const brand = car['brand'];
                const year = car['year'];
                const color = car['color'];
                const motor = car['motor'];
                const id = car['id'];

                const newCar = wrapper.querySelectorAll('.card')[0].cloneNode(true);

                newCar.querySelector('.car-brand').innerHTML = brand
                newCar.querySelector('.car-year').innerHTML = 'year - ' + year
                newCar.querySelector('.car-color').innerHTML = 'color - ' + color
                newCar.querySelector('.car-motor').innerHTML = 'motor - ' + motor
                newCar.querySelector('.f_edit-item').dataset.itemId = id
                newCar.querySelector('.f_delete-item').dataset.itemId = id
                newCar.style.display = 'block'

                newCar.querySelector('.f_edit-item').addEventListener('click', () => {
                    this.editCar(id)
                })

                newCar.querySelector('.f_delete-item').addEventListener('click', () => {
                    this.deleteCar(id)
                })

                wrapper.querySelector('.cards-container').appendChild(newCar)
            })
        })
    }

    addCar() {
        wrapper.querySelector('.form-title').innerHTML = 'Add new car'
        wrapper.querySelector('.save-btn').value = 'add'

        new Modal().openModal()
    }

    saveCar() {
        const brand = wrapper.querySelector('#select-brand').value
        const year = wrapper.querySelector('#select-year').value
        const color = wrapper.querySelector('#select-color').value
        const motor = wrapper.querySelector('#select-motor').value
        const dataType = wrapper.querySelector('.dataType').value

        if (brand && year && color && motor) {
            const requestUrl = `${ACTIONS_DIR}/addAction.php?brand=${brand}&year=${year}&color=${color}&motor=${motor}&dataType=${dataType}`
            new Data().getData(requestUrl).then(id => {
                const newCar = wrapper.querySelectorAll('.card')[0].cloneNode(true);
                newCar.querySelector('.car-brand').innerHTML = brand
                newCar.querySelector('.car-year').innerHTML = 'year - ' + year
                newCar.querySelector('.car-color').innerHTML = 'color - ' + color
                newCar.querySelector('.car-motor').innerHTML = 'motor - ' + motor
                newCar.querySelector('.f_edit-item').dataset.itemId = id
                newCar.querySelector('.f_delete-item').dataset.itemId = id
                newCar.style.display = 'block'

                newCar.querySelector('.f_edit-item').addEventListener('click', () => {
                    this.editCar(id)
                })

                newCar.querySelector('.f_delete-item').addEventListener('click', () => {
                    this.deleteCar(id)
                })

                wrapper.querySelector('.cards-container').appendChild(newCar)
            })

            new Modal().closeModal()
        } else {
            new Modal().setError()
        }
    }

    editCar(id) {
        const dataType = wrapper.querySelector('.dataType').value

        const requestUrl = `${ACTIONS_DIR}/editAction.php?edit=${id}&dataType=${dataType}`
        const data = new Data().getData(requestUrl);
        data.then(car => {
            const c = new Car()
            c.setEditCar('#select-brand', car['brand'])
            c.setEditCar('#select-year', car['year'])
            c.setEditCar('#select-color', car['color'])
            c.setEditCar('#select-motor', car['motor'])
            wrapper.querySelector('#select-id').value = car['id']
        })

        wrapper.querySelector('.form-title').innerHTML = 'Update car'
        wrapper.querySelector('.save-btn').value = 'update'
        new Modal().openModal()
    }

    updateCar() {
        const brand = wrapper.querySelector('#select-brand').value
        const year = wrapper.querySelector('#select-year').value
        const color = wrapper.querySelector('#select-color').value
        const motor = wrapper.querySelector('#select-motor').value
        const id = wrapper.querySelector('#select-id').value
        const dataType = wrapper.querySelector('.dataType').value

        const requestUrl = `${ACTIONS_DIR}/updateAction.php?brand=${brand}&year=${year}&color=${color}&motor=${motor}&id=${id}&dataType=${dataType}`

        if (brand && year && color && motor && id) {
            new Data().getData(requestUrl).then(() => {
                wrapper.querySelectorAll('.card').forEach(car => {
                    if (car.querySelector('.f_edit-item').dataset.itemId === id) {
                        car.querySelector('.car-brand').innerHTML = brand
                        car.querySelector('.car-year').innerHTML = 'year - ' + year
                        car.querySelector('.car-color').innerHTML = 'color - ' + color
                        car.querySelector('.car-motor').innerHTML = 'motor - ' + motor
                    }
                })
            })

            new Modal().closeModal()
        } else {
            new Modal().setError()
        }
    }

    deleteCar(id) {
        const dataType = wrapper.querySelector('.dataType').value

        const requestUrl = `${ACTIONS_DIR}/deleteAction.php?delete=${id}&dataType=${dataType}`
        new Data().getData(requestUrl).then(() => {
            wrapper.querySelectorAll('.card').forEach(car => {
                if (car.querySelector('.f_delete-item').dataset.itemId === id + '') {
                    car.remove();
                }
            })
        })
    }

    setEditCar(elementId, value) {
        wrapper.querySelector(elementId).querySelectorAll('option').forEach(el => {
            if ('' + el.value === value + '') {
                el.selected = true
            }
        })
    }

}

class Data {
    getData(url) {
        return fetch(url).then(res => res.json())
    }
}

class Modal {
    setOptionsInModal() {
        this.setBrands('')
        this.setColors('')
    }

    setBrands(searchText) {

        const requestUrl = `${ACTIONS_DIR}/searchAction.php?search=${searchText}&dataType=brand`
        const data = new Data().getData(requestUrl);

        data.then(brands => {
            brands.forEach(brand => {
                const brandName = brand['title']
                const el = `<option value="${brandName}">${brandName}</option>`
                wrapper.querySelector('#select-brand').innerHTML += el;
            })

        })
    }

    setColors(searchText) {

        const requestUrl = `${ACTIONS_DIR}/searchAction.php?search=${searchText}&dataType=color`
        const data = new Data().getData(requestUrl);

        data.then(colors => {

            colors.forEach(color => {
                const colorName = color['title']
                const el = `<option value="${colorName}">${colorName}</option>`
                wrapper.querySelector('#select-color').innerHTML += el;
            })

        })
    }

    openModal() {
        wrapper.querySelector('.form-container').classList.add('active')
    }

    closeModal() {
        wrapper.querySelector('.form-container').classList.remove('active')

        const car = new Car();

        car.setEditCar('#select-brand', '')
        car.setEditCar('#select-year', '')
        car.setEditCar('#select-color', '')
        car.setEditCar('#select-motor', '')

        wrapper.querySelector('#select-brand').style.outline = 'none'
        wrapper.querySelector('#select-year').style.outline = 'none'
        wrapper.querySelector('#select-color').style.outline = 'none'
        wrapper.querySelector('#select-motor').style.outline = 'none'

    }

    setError() {
        const brand = wrapper.querySelector('#select-brand');
        const year = wrapper.querySelector('#select-year');
        const color = wrapper.querySelector('#select-color');
        const motor = wrapper.querySelector('#select-motor');

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

new Car().init();