import ModalUiHelper from "./ModalUiHelper.js";


export default class CarUiHelper {
    constructor() {
        this.modalUiHelper = new ModalUiHelper()
    }

    drawCars(cars, editCar, deleteCar) {
        document.querySelectorAll(".card").forEach((car) => {
            if (car.style.display !== "none") {
                car.remove();
            }
        });

        cars.forEach((car) => {
            this.fillCarData(car, editCar, deleteCar);
        });
    }

    deleteCar(id) {
        document.querySelectorAll(".card").forEach((car) => {
            if (car.dataset.id === id + "") {
                car.remove();
            }
        });
    }

    updateCar(data) {
        document.querySelectorAll(".card").forEach((car) => {
            if (car.dataset.id === data.id) {
                this.updateCarUIData(car, data);
            }
        });
    }

    fillCarData(params, editCar, deleteCar) {
        const car = document.querySelector(".f_card").cloneNode(true);

        car.dataset.id = params['id'];
        car.style.display = "block";

        this.updateCarUIData(car, params);

        car.querySelector(".f_edit-item").addEventListener("click", (event) => {
            if (!event.currentTarget.closest(".f_card")) {
                return
            }

            const id = event.currentTarget.closest(".f_card").dataset.id
            if (!id) {
                return
            }

            editCar(id);

            this.modalUiHelper.open('update');
        });

        car.querySelector(".f_delete-item").addEventListener("click", (event) => {
            if (!event.currentTarget.closest(".f_card")) {
                return
            }

            const id = event.currentTarget.closest(".f_card").dataset.id

            if (!id) {
                return
            }

            deleteCar(id);
        });

        document.querySelector(".cards-container").appendChild(car);
    }

    updateCarUIData(car, params) {
        car.querySelector(".car-brand").innerHTML = params['brand'];
        car.querySelector(".car-year").innerHTML = params['year'];
        car.querySelector(".car-color").innerHTML = params['color'];
        car.querySelector(".car-motor").innerHTML = params['motor'];
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
        }
    }

    setCarEditData(params) {
        document.querySelector("#select-brand").value = params['brand'];
        document.querySelector("#select-year").value = params['year'];
        document.querySelector("#select-color").value = params['color'];
        document.querySelector("#select-motor").value = params['motor'];
        document.querySelector("#select-id").value = params['id'];
    }

}