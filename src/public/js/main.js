const buttonsOpen = document.querySelectorAll('.modalStart');
const modal = document.getElementById('easyModal');
const buttonClose = document.getElementsByClassName('modalEnd')[0];

const modalName = document.getElementById('modalName');
const modalGender = document.getElementById('modalGender');
const modalMail = document.getElementById('modalMail');
const modalTel = document.getElementById('modalTel');
const modalAddress = document.getElementById('modalAddress');
const modalBuilding = document.getElementById('modalBuilding');
const modalContent = document.getElementById('modalContent');
const modalText = document.getElementById('modalText');
const modalDeleteId = document.getElementById('modalDeleteId');

buttonsOpen.forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const gender = button.getAttribute('data-gender');
        const mail = button.getAttribute('data-mail');
        const tel = button.getAttribute('data-tel');
        const address = button.getAttribute('data-address');
        const building = button.getAttribute('data-building');
        const content = button.getAttribute('data-content');
        const text = button.getAttribute('data-text');

        modalName.value = name;
        modalGender.value = gender;
        modalMail.value = mail;
        modalTel.value = tel;
        modalAddress.value = address;
        modalBuilding.value = building;
        modalContent.value = content;
        modalText.value = text;
        modalDeleteId.value = id;

        modal.style.display = 'block';
    });
});

buttonClose.addEventListener('click', modalClose);
function modalClose() {
    modal.style.display = 'none';
}

addEventListener('click', outsideClose);
function outsideClose(e) {
    if (e.target == modal) {
        modal.style.display = 'none';
        }
}
