(async () => {
    let baseURL = 'https://eds.wellingtoncesar.com.br'
    let template = document.querySelector('#file-display')

    let dataSearch = async type => {
        let response = await fetch(`${baseURL}/api/featured/featured.php?feature-type=${type}`, { mode: "no-cors" })
        if (!response.ok) {
            console.log('Chamada sem sucesso')
            return
        }
        return await response.json()
    }

    let time = await dataSearch('time')
    let downloads = await dataSearch('downloads')
    let votes = await dataSearch('votes')

    makeDisplay = async (type, number) => {
        let display = template.content.cloneNode(true)
        let h4 = display.querySelector('h4')
        let h5 = display.querySelector('h5')
        let h6 = display.querySelectorAll('h6')
        data = type[number]
        h4.textContent = data['identificador']
        h5.textContent = data['titulo']
        h6[0].textContent = `Votos: ${123}`
        h6[0].textContent = `Downloads: ${data['qtd_downloads']}`
        h6[0].textContent = `Comentários: ${456}`
        return display
    }

    makeDisplayRow = async rowName => {
        let a = {
            'votes': votes,
            'downloads': downloads,
            'time': time
        }
        let row = document.querySelector(`#${rowName}`)
        for (let i of [0, 1, 2]) {
            let display = await makeDisplay(a[rowName], i)
            if (display)
                row.appendChild(display)
        }
    }

    await makeDisplayRow('votes')
    await makeDisplayRow('downloads')
    await makeDisplayRow('time')

})()
