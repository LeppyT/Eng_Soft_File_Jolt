(async () => {
    let baseURL = 'https://eds.wellingtoncesar.com.br'

    let modify = (id, new_content) => {
        let votes = document.querySelector(id)
        votes.textContent = new_content
    }

    modify('#downloads', '123')
    modify('#votes', '456')
    modify('#title', 'Título')
    modify('#user', 'maria')
    modify('#description', 'abc')

})()
