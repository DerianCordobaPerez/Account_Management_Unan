const filterTable = () => {
    const input = document.querySelector('#search-payment-id')
    const filter = input.value.toUpperCase()
    const table = document.querySelector('#payment-table')
    const tr = table.querySelectorAll('tr')

    tr.forEach(tr => {
        const td = tr.querySelectorAll('td')[0]
        if(td) {
            const id = `${td.textContent || td.innerText}`
            const exists = id.toUpperCase().indexOf(filter) > -1
            tr.style.display = `${exists ? '' : 'none'}`
        }
    })
}

const resetTable = () => {
    const table = document.querySelector('#payment-table')
    const tr = table.querySelectorAll('tr')
    tr.forEach(tr => tr.style.display = '')
}
