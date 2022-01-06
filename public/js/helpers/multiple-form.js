const form = document.querySelector('.form-register')
const amount = document.getElementById('amount')

console.log(numeroALetras(529.66))

form.addEventListener('click', ({target}) => {
    const isButtonNext = target.classList.contains('step__button--next')
    const isButtonBack = target.classList.contains('step__button--back')

    if (isButtonNext || isButtonBack) {
        const currentStep = document.getElementById(`step-${target.dataset.step}`)
        const jumpStep = document.getElementById(`step-${target.dataset.to_step}`)

        currentStep.addEventListener('animationend', function callback() {
            currentStep.classList.remove('active')
            jumpStep.classList.add('active')

            if (isButtonNext) {
                currentStep.classList.add('to-left')
            } else {
                jumpStep.classList.remove('to-left')
            }
            currentStep.removeEventListener('animationend', callback)
        })

        currentStep.classList.add('inactive')
        jumpStep.classList.remove('inactive')
    }
})

const convertNumberToWord = (origin, from) => {
    const number = origin.value.toString()
    const word = numeroALetras(number)
    const wordElement = document.getElementById(`${from}`)
    wordElement.value = word
}

amount.addEventListener('keyup', () => convertNumberToWord(amount, 'amount_in_letters'))
