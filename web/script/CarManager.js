import DomManager from "./DomManager.js";
import DataManager from "./DataManager.js";

export default class CarManager {
  init() {
    window.onload = () => {
      const dom = new DomManager();

      this.getCars();
      this.setListeners();
      dom.setOptions("#select-brand", "brand");
      dom.setOptions("#select-color", "color");
    };
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

    document.querySelector(".search-car").addEventListener("keyup", () => {
      this.getCars(document.querySelector(".search-car").value.trim());
    });

    document.querySelector(".form-container").addEventListener("click", () => {
      new DomManager().closeModal();
    });

    document.querySelector(".cancel-btn").addEventListener("click", () => {
      new DomManager().closeModal();
    });

    document.querySelector(".form-car").addEventListener("click", (e) => {
      e.stopPropagation();
      e.preventDefault();
    });
  }

  getCars(searchText = "") {
    const dataType = document.querySelector(".dataType").value;

    const requestUrl = `classes/actions/searchAction.php?search=${searchText}&dataType=${dataType}`;
    const data = new DataManager().getData(requestUrl);

    data.then((cars) => {
      document.querySelectorAll(".card").forEach((car) => {
        if (car.style.display !== "none") {
          car.remove();
        }
      });
      cars.forEach((car) => {
        const brand = car["brand"];
        const year = car["year"];
        const color = car["color"];
        const motor = car["motor"];
        const id = car["id"];

        const newCar = document.querySelector(".f_card").cloneNode(true);

        newCar.dataset.id = id;
        newCar.querySelector(".car-brand").innerHTML = brand;
        newCar.querySelector(".car-year").innerHTML = year;
        newCar.querySelector(".car-color").innerHTML = color;
        newCar.querySelector(".car-motor").innerHTML = motor;
        newCar.style.display = "block";

        newCar
          .querySelector(".f_edit-item")
          .addEventListener("click", (event) => {
            let id;

            if (event.currentTarget.closest(".f_card")) {
              id = event.currentTarget.closest(".f_card").dataset.id;
            } else {
              id = null;
            }

            this.editCar(id);
          });

        newCar
          .querySelector(".f_delete-item")
          .addEventListener("click", (event) => {
            let id;

            if (event.currentTarget.closest(".f_card")) {
              id = event.currentTarget.closest(".f_card").dataset.id;
            } else {
              id = null;
            }

            this.deleteCar(id);
          });

        document.querySelector(".cards-container").appendChild(newCar);
      });
    });
  }

  addCar() {
    document.querySelector(".form-title").innerHTML = "Add new car";
    document.querySelector(".save-btn").value = "add";

    new DomManager().openModal();
  }

  saveCar() {
    const brand = document.querySelector("#select-brand").value;
    const year = document.querySelector("#select-year").value;
    const color = document.querySelector("#select-color").value;
    const motor = document.querySelector("#select-motor").value;
    const dataType = document.querySelector(".dataType").value;

    if (brand && year && color && motor) {
      const requestUrl = `classes/actions/addAction.php?brand=${brand}&year=${year}&color=${color}&motor=${motor}&dataType=${dataType}`;
      new DataManager().getData(requestUrl).then((id) => {
        const newCar = document.querySelectorAll(".card")[0].cloneNode(true);
        newCar.dataset.id = id;
        newCar.querySelector(".car-brand").innerHTML = brand;
        newCar.querySelector(".car-year").innerHTML = year;
        newCar.querySelector(".car-color").innerHTML = color;
        newCar.querySelector(".car-motor").innerHTML = motor;
        newCar.style.display = "block";

        newCar
          .querySelector(".f_edit-item")
          .addEventListener("click", (event) => {
            let id;

            if (event.currentTarget.closest(".f_card")) {
              id = event.currentTarget.closest(".f_card").dataset.id;
            } else {
              id = null;
            }

            this.editCar(id);
          });

        newCar
          .querySelector(".f_delete-item")
          .addEventListener("click", (event) => {
            let id;

            if (event.currentTarget.closest(".f_card")) {
              id = event.currentTarget.closest(".f_card").dataset.id;
            } else {
              id = null;
            }

            this.deleteCar(id);
          });

        document.querySelector(".cards-container").appendChild(newCar);
      });

      new DomManager().closeModal();
    } else {
      new DomManager().setError();
    }
  }

  editCar(id) {
    const dom = new DomManager();
    const dataType = document.querySelector(".dataType").value;
    const requestUrl = `classes/actions/editAction.php?edit=${id}&dataType=${dataType}`;
    const data = new DataManager().getData(requestUrl);

    data.then((car) => {
      dom.setValueById("#select-brand", car["brand"]);
      dom.setValueById("#select-year", car["year"]);
      dom.setValueById("#select-color", car["color"]);
      dom.setValueById("#select-motor", car["motor"]);
      document.querySelector("#select-id").value = car["id"];
    });

    document.querySelector(".form-title").innerHTML = "Update car";
    document.querySelector(".save-btn").value = "update";
    dom.openModal();
  }

  updateCar() {
    const brand = document.querySelector("#select-brand").value;
    const year = document.querySelector("#select-year").value;
    const color = document.querySelector("#select-color").value;
    const motor = document.querySelector("#select-motor").value;
    const id = document.querySelector("#select-id").value;
    const dataType = document.querySelector(".dataType").value;
    const dom = new DomManager();

    const requestUrl = `classes/actions/updateAction.php?brand=${brand}&year=${year}&color=${color}&motor=${motor}&id=${id}&dataType=${dataType}`;

    if (brand && year && color && motor && id) {
      new DataManager().getData(requestUrl).then(() => {
        document.querySelectorAll(".card").forEach((car) => {
          if (car.dataset.id === id) {
            car.querySelector(".car-brand").innerHTML = brand;
            car.querySelector(".car-year").innerHTML = year;
            car.querySelector(".car-color").innerHTML = color;
            car.querySelector(".car-motor").innerHTML = motor;
          }
        });
      });

      dom.closeModal();
    } else {
      dom.setError();
    }
  }

  deleteCar(id) {
    const dataType = document.querySelector(".dataType").value;

    const requestUrl = `classes/actions/deleteAction.php?delete=${id}&dataType=${dataType}`;
    new DataManager().getData(requestUrl).then(() => {
      document.querySelectorAll(".card").forEach((car) => {
        if (car.dataset.id === id + "") {
          car.remove();
        }
      });
    });
  }
}