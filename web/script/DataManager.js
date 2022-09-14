export default class DataManager {
    getData(url) {
        return fetch(url).then(res => res.json())
    }
}
