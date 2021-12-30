const checkboxs = document.querySelectorAll('input[name="privileges[]"]')

const validateCheckboxs = () => {
    const checkboxAllPrivileges = document.getElementById('all_privileges')
    const checkboxCheck = document.querySelectorAll('input[name="privileges[]"]:checked').length
    checkboxAllPrivileges.checked = checkboxs.length === checkboxCheck
}

const toggle = (source) => {
    checkboxs.forEach(checkbox => checkbox.checked = source.checked)
    console.log({source})
}
