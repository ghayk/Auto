export default {
    ACTIONS_DIR: 'classes/actions',

    getData(actionName, params) {
        const requestUrl = `${this.ACTIONS_DIR}/${actionName}.php?${new URLSearchParams(params).toString()}`

        return fetch(requestUrl).then(res => res.json())
    }
}