const filterTable = (input, tableId) => {
    const filter = input.value.toUpperCase()
    console.log(input, filter)
    const table = document.querySelector(`#${tableId}`)
    const tr = table.querySelectorAll('tr')

    tr.forEach(tr => {
        const td = tr.querySelectorAll('td')[1]
        if(td) {
            const id = `${td.textContent || td.innerText}`
            const exists = id.toUpperCase().indexOf(filter) > -1
            tr.style.display = `${exists ? '' : 'none'}`
        }
    })
}

const resetTable = (tableId) => {
    const table = document.querySelector(`#${tableId}`)
    const tr = table.querySelectorAll('tr')
    tr.forEach(tr => tr.style.display = '')
}
