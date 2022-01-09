const allTdStepTwo = document.querySelectorAll('.step-two')
const allTdStepThree = document.querySelectorAll('.step-three')

const conceptTd = document.getElementById('concept-table')
const conceptSelect = document.getElementById('concepts')

const amount = document.getElementById('amount')
const amountTd = document.getElementById('amount-table')
const amountInLetterTd = document.getElementById('amount-in-letters-table')
const amountInLetters = document.getElementById('amount_in_letters')

const currencyTd = document.getElementById('currency-table')
const currencySelect = document.getElementById('currencies')

const dateMadePaymentTd = document.getElementById('date-made-payment-table')
const dateMadePayment = document.getElementById('date_made_payments')

const paymentRegistrationDateTd = document.getElementById('payment-registration-date-table')
const paymentRegistrationDate = document.getElementById('payment_registration_dates')

const observationTable = document.getElementById('observation-table')
const observation = document.getElementById('observations')

const paymentReceivedTd = document.getElementById('payment-received-table')
const paymentReceived = document.getElementById('payment_received')

const accountIsPaymentTd = document.getElementById('account-is-payment-table')
const accountIsPayment = document.getElementById('account_is_payment')

const identificationTd = document.getElementById('identification-table')
const identification = document.getElementById('identification')

const receiptNumberTd = document.getElementById('receipt-number-table')
const receiptNumber = document.getElementById('receipt_number')

const payTimeTd = document.getElementById('pay-time-table')
const payTime = document.getElementById('pay_time')

const cashierTd = document.getElementById('cashier-table')
const cashier = document.getElementById('cashier')

const cashierIdentificationTd = document.getElementById('cashier-identification-table')
const cashierIdentification = document.getElementById('cashier_identification')

const stepBackOne = document.getElementById('step-button-back-1')
const stepTwo = document.getElementById('step-button-2')
const stepThree = document.getElementById('step-button-3')

const buttonFinish = document.getElementById('button-finish')

const convertNumberToWord = (origin, from) => {
    const number = origin.value.toString()
    const word = numberToLetters(number)
    const wordElement = document.getElementById(`${from}`)
    wordElement.value = word
}

amount.addEventListener('keyup', () => convertNumberToWord(amount, 'amount_in_letters'))

const initialValues = () => {
    amount.value = document.getElementById(`amount-${conceptSelect.selectedIndex}`).value
    conceptTd.innerText = conceptSelect.options[conceptSelect.selectedIndex].text
    amountInLetters.value = numberToLetters(amount.value)
    amountTd.innerText = amount.value
    amountInLetterTd.innerText = amountInLetters.value
    currencyTd.innerText = currencySelect.options[currencySelect.selectedIndex].text
}

document.addEventListener('DOMContentLoaded', initialValues)

conceptSelect.addEventListener('change', () => {
    conceptTd.innerText = conceptSelect.options[conceptSelect.selectedIndex].text
    amount.value = document.getElementById(`amount-${conceptSelect.selectedIndex}`).value
    amountTd.innerText = `${amount.value}`
    amountInLetters.value = numberToLetters(amount.value)
    amountInLetterTd.innerText = amountInLetters.value
})

currencySelect.addEventListener('change', () => {
    currencyTd.innerText = currencySelect.options[currencySelect.selectedIndex].text
})

dateMadePayment.addEventListener('change', () => {
    dateMadePaymentTd.innerText = dateMadePayment.value
})

paymentRegistrationDate.addEventListener('change', () => {
    paymentRegistrationDateTd.innerText = paymentRegistrationDate.value
})

observation.addEventListener('keyup', () => {
    if(observation.value.length <= 20)
        observationTable.innerText = observation.value
    else
        observationTable.innerText = `${observation.value.substring(0, 20)}...`
})

paymentReceived.addEventListener('keyup', () => {
    paymentReceivedTd.innerText = paymentReceived.value
})

accountIsPayment.addEventListener('keyup', () => {
    accountIsPaymentTd.innerText = accountIsPayment.value
})

identification.addEventListener('keyup', () => {
    identificationTd.innerText = identification.value
})

identification.addEventListener('blur', () => {
    identificationTd.innerText = identification.value
})

receiptNumber.addEventListener('keyup', () => {
    receiptNumberTd.innerText = receiptNumber.value
})

payTime.addEventListener('change', () => {
    payTimeTd.innerText = payTime.value
})

cashier.addEventListener('keyup', () => {
    cashierTd.innerText = cashier.value
})

cashierIdentification.addEventListener('keyup', () => {
    cashierIdentificationTd.innerText = cashierIdentification.value
})

stepTwo.addEventListener('click', () => {
    amountInLetters.disabled = false
    amount.disabled = false
    allTdStepTwo.forEach(td => td.removeAttribute('hidden'))
})

stepThree.addEventListener('click', () => {
    allTdStepThree.forEach(td => td.removeAttribute('hidden'))
})

stepBackOne.addEventListener('click', () => {
    amountInLetters.disabled = true
    amount.disabled = true
})
