import UiHelper from "./UiHelper.js";
import ApiHelper from "./ApiHelper.js";

export default class CarManager {

    constructor() {
        this.uiHelper = new UiHelper();
    }

    init() {
        this.setListeners();
        this.getCars();
        this.setOptions("#select-brand", "brand", 'getBrandsAction');
        this.setOptions("#select-color", "color", 'getColorsAction');
    }

    setListeners() {
        document.querySelector(".dataType").addEventListener("change", () => {
            document.querySelector(".search-car").value = "";
            this.getCars();
        });

        document.querySelector(".add-btn").addEventListener("click", () => {
            this.addCar();
        });

        document.querySelector(".save-btn").addEventListener("click", () => {
            if (document.querySelector(".save-btn").value === "add") {
                this.saveCar();
            }
            if (document.querySelector(".save-btn").value === "update") {
                this.updateCar();
            }
        });

        let search;
        document.querySelector(".search-car").addEventListener("keyup", () => {
            if (search) {
                clearTimeout(search)
            }

            search = setTimeout(() => {
                this.getCars(document.querySelector(".search-car").value.trim());
            }, 500)
        });

        document.querySelector(".form-container").addEventListener("click", () => {
            this.uiHelper.closeModal();
        });

        document.querySelector(".cancel-btn").addEventListener("click", () => {
            this.uiHelper.closeModal();
        });

        document.querySelector(".form-car").addEventListener("click", (e) => {
            e.stopPropagation();
            e.preventDefault();
        });
    }

    getCars(searchText = "") {
        const dataType = document.querySelector(".dataType").value;

        const data = ApiHelper.getData('getCarsAction', {
            'search': searchText,
            'dataType': dataType
        });

        data.then((cars) => {
            document.querySelectorAll(".card").forEach((car) => {
                if (car.style.display !== "none") {
                    car.remove();
                }
            });
            cars.forEach((car) => {
                const newCar = document.querySelector(".f_card").cloneNode(true);

                this.fillCarData(newCar, car);
            });
        });
    }

    addCar() {
        this.uiHelper.openModal('add');
    }

    saveCar() {
        const data = this.getCarEditData()

        if (!data) {
            this.uiHelper.setError();
        }

        ApiHelper.getData('addAction', data).then((id) => {
            const newCar = document.querySelector(".card").cloneNode(true);

            this.fillCarData(newCar, {...data, id: id});
        });

        this.uiHelper.closeModal();
    }

    editCar(id) {
        const dataType = document.querySelector(".dataType").value;

        const data = ApiHelper.getData('editAction', {
            'edit': id,
            'dataType': dataType
        });

        data.then((car) => {
            this.uiHelper.setValues(car);
        });
    }

    updateCar() {
        const data = this.getCarEditData();

        if (!data) {
            this.uiHelper.setError();
        }

        ApiHelper.getData('updateAction', data).then(() => {
            document.querySelectorAll(".card").forEach((car) => {
                if (car.dataset.id === data.id) {
                    this.updateCarUIData(car, data);
                }
            });
        });

        this.uiHelper.closeModal();
    }

    deleteCar(id) {
        const dataType = document.querySelector(".dataType").value;

        ApiHelper.getData('deleteAction', {
            'delete': id,
            'dataType': dataType
        }).then(() => {
            document.querySelectorAll(".card").forEach((car) => {
                if (car.dataset.id === id + "") {
                    car.remove();
                }
            });
        });
    }

    getCarEditData() {
        const brand = document.querySelector("#select-brand").value;
        const year = document.querySelector("#select-year").value;
        const color = document.querySelector("#select-color").value;
        const motor = document.querySelector("#select-motor").value;
        const id = document.querySelector("#select-id").value;
        const dataType = document.querySelector(".dataType").value;

        return {
            'id': id,
            'brand': brand,
            'year': year,
            'color': color,
            'motor': motor,
            'dataType': dataType
        };
    }

    fillCarData(car, params) {
        car.dataset.id = params['id'];
        this.updateCarUIData(car, params);
        car.style.display = "block";

        car.querySelector(".f_edit-item").addEventListener("click", (event) => {
            if (!event.currentTarget.closest(".f_card")) {
                return
            }

            const id = event.currentTarget.closest(".f_card").dataset.id

            if (!id) {
                return
            }

            this.uiHelper.openModal('update');
            this.editCar(id);
        });

        car.querySelector(".f_delete-item").addEventListener("click", (event) => {
            if (!event.currentTarget.closest(".f_card")) {
                return
            }

            const id = event.currentTarget.closest(".f_card").dataset.id

            if (!id) {
                return
            }

            this.deleteCar(id);
        });

        document.querySelector(".cards-container").appendChild(car);
    }

    updateCarUIData(car, params) {
        car.querySelector(".car-brand").innerHTML = params['brand'];
        car.querySelector(".car-year").innerHTML = params['year'];
        car.querySelector(".car-color").innerHTML = params['color'];
        car.querySelector(".car-motor").innerHTML = params['motor'];
    }

    setOptions(elementId, dataType, actionName, searchText = '') {
        const data = ApiHelper.getData(actionName, {
            'search': searchText,
            'dataType': dataType
        });

        data.then(brands => {
            brands.forEach(brand => {
                const brandName = brand['title']
                const el = `<option value="${brandName}">${brandName}</option>`
                document.querySelector(elementId).innerHTML += el;
            })

        })
    }
}