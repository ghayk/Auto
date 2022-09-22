import ApiHelper from "../helper/ApiHelper.js";

export default class CarManager {

    getCars(searchText = "") {
        const dataType = document.querySelector(".dataType").value;

        return ApiHelper.getData('getCarsAction', {
            'search': searchText,
            'dataType': dataType
        });
    }

    saveCar(data) {
        return ApiHelper.getData('addAction', data);
    }

    getEditCar(id) {
        const dataType = document.querySelector(".dataType").value;

        return ApiHelper.getData('editAction', {
            'edit': id,
            'dataType': dataType
        });
    }

    deleteCar(id) {
        const dataType = document.querySelector(".dataType").value;

        ApiHelper.getData('deleteAction', {
            'delete': id,
            'dataType': dataType
        }).then(id => id);
    }

    updateCar(data) {
        return ApiHelper.getData('updateAction', data);
    }

    getModalOptions(dataType, actionName, searchText = '') {
        return ApiHelper.getData(actionName, {
            'search': searchText,
            'dataType': dataType
        });
    }
}