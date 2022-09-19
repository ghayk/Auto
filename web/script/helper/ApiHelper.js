export default {
    ACTIONS_DIR: 'classes/actions',

    async getData(actionName, params) {
        const requestUrl = `${this.ACTIONS_DIR}/${actionName}.php?${new URLSearchParams(params).toString()}`

        const response = await fetch(requestUrl)
        return await response.json();
    }
}