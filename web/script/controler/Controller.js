import CarManager from "../manager/CarManager.js";
import CarUiHelper from "../helper/CarUiHelper.js";
import ModalUiHelper from "../helper/ModalUiHelper.js";

export default class Controller {

    constructor() {
        this.carManager = new CarManager()
        this.carUiHelper = new CarUiHelper()
        this.modalUiHelper = new ModalUiHelper()
    }

    init() {
        this.getCars()
        this.setListeners();
        this.setModalOptions();
    }

    setListeners() {
        document.querySelector(".dataType").addEventListener("change", () => {
            document.querySelector(".search-car").value = "";
            this.getCars()
        });

        document.querySelector(".add-btn").addEventListener("click", () => {
            this.addCar();
        });

        document.querySelector(".save-btn").addEventListener("click", () => {
            this.saveCar();
        })

        document.querySelector(".update-btn").addEventListener("click", () => {
            this.updateCar();
        })

        document.querySelector(".search-car").addEventListener("keyup", () => {
            this.getCars(document.querySelector(".search-car").value.trim());
        });


        document.querySelector(".form-container").addEventListener("click", () => {
            this.modalUiHelper.close();
        });

        document.querySelector(".cancel-btn").addEventListener("click", () => {
            this.modalUiHelper.close();
        });

        document.querySelector(".form-car").addEventListener("click", (e) => {
            e.stopPropagation();
            e.preventDefault();
        });
    }

    getCars(searchText) {
        this.carManager.getCars(searchText).then(cars => {
            this.carUiHelper.drawCars(cars, (id) => {
                this.editCar(id)
            }, (id) => {
                this.deleteCar(id)
            })
        })
    }

    deleteCar(id) {
        this.carManager.deleteCar(id);
        this.carUiHelper.deleteCar(id);
        this.modalUiHelper.close();
    }

    editCar(id) {
        this.carManager.getEditCar(id).then(car => {
            this.carUiHelper.setCarEditData(car)
        })
    }

    addCar() {
        this.modalUiHelper.open('add');
    }

    saveCar() {
        const data = this.carUiHelper.getCarEditData();


        if (!(data['brand'] && data['year'] && data['color'] && data['motor'])) {
            this.modalUiHelper.setError();
            return
        }

        this.carManager.saveCar(data).then(id => {
            this.carUiHelper.fillCarData({...data, id: id}, () => {
                this.editCar(id)
            }, () => {
                this.deleteCar(id)
            })
            this.modalUiHelper.close();
        })
    }

    updateCar() {
        const data = this.carUiHelper.getCarEditData();

        if (!(data['brand'] && data['year'] && data['color'] && data['motor'])) {
            this.modalUiHelper.setError();
            return
        }

        this.carManager.updateCar(data).then(id => id)
        this.carUiHelper.updateCar(data)
        this.modalUiHelper.close()
    }

    setModalOptions() {
        this.carManager.getModalOptions('mysql', 'getBrandsAction').then(brands => {
            this.modalUiHelper.setOptions('#select-brand', brands)
        })

        this.carManager.getModalOptions('mysql', 'getColorsAction').then(colors => {
            this.modalUiHelper.setOptions('#select-color', colors)
        })
    }
}