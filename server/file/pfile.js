(async () => {
    let baseURL = 'https://eds.wellingtoncesar.com.br'
    const urlParams = new URLSearchParams(location.search)

    let dataSearch = async () => {
        let response = await fetch(`${baseURL}/api/file?nome=${urlParams.get("nome")}&username=${urlParams.get("user")}`)
        if (!response.ok) {
            console.log('Chamada sem sucesso')
            return
        }
        return await response.json()
    }

    let modify = (id, new_content) => {
        let votes = document.querySelector(id)
        votes.textContent = new_content
    }

    let data = await dataSearch();

    modify('#downloads', data["qtd_downloads"])
    modify('#votes', '456')
    modify('#title', data["titulo"])
    modify('#user', data["user"])
    modify('#description', data["descricao"])
    document.querySelector("#capa").src = `${baseURL}/api/fileimage?username=${data["username"]}&nome=${data["nome"]}`

})()
