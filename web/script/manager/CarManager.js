import ApiHelper from "../helper/ApiHelper.js";

export default class CarManager {

    getCars(searchText = "") {
        const dataType = document.querySelector(".dataType").value;

        return ApiHelper.getData('getCarsAction', {
            'searchText': searchText,
            'dataType': dataType
        });
    }

    saveCar(data) {
        return ApiHelper.getData('addAction', data);
    }

    getEditCar(id) {
        const dataType = document.querySelector(".dataType").value;

        return ApiHelper.getData('editAction', {
            'id': id,
            'dataType': dataType
        });
    }

    deleteCar(id) {
        const dataType = document.querySelector(".dataType").value;

        ApiHelper.getData('deleteAction', {
            'id': id,
            'dataType': dataType
        }).then(id => id);
    }

    updateCar(data) {
        return ApiHelper.getData('updateAction', data);
    }

    getModalOptions(dataType, actionName, searchText = '') {
        return ApiHelper.getData(actionName, {
            'searchText': searchText,
            'dataType': dataType
        });
    }
}