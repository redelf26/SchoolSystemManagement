document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('nav ul li a');
    const sections = document.querySelectorAll('section');

    function hideAllSections() {
        sections.forEach(section => {
            section.style.display = 'none';
        });
    }

    navLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                hideAllSections();
                targetSection.style.display = 'flex';
            }
        });
    });

    hideAllSections();
    if (sections.length > 0) {
        sections[0].style.display = 'flex';
    }

    const qrButtons = document.querySelectorAll('button[id^=generateQR]');
    qrButtons.forEach(button => {
        button.addEventListener('click', function () {
            const referenceNumber = this.getAttribute('data-reference');
            generateQR(referenceNumber);
        });
    });
});

function generateQR(referenceNumber) {
    const dialog = document.getElementById("modal");
    const qrcodeDiv = document.getElementById("qrcode");
    const selectedReference = document.getElementById("selectedReference");
    selectedReference.innerText = referenceNumber;

    qrcodeDiv.innerHTML = "";

    try {
        new QRCode(qrcodeDiv, {
            text: referenceNumber,
            width: 128,
            height: 128,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
        
        dialog.showModal();
    } catch (error) {
        console.error("Error generating QR code:", error);
        alert("Error generating QR code. Please try again.");
    }
}

function closeDialog() {
    const dialog = document.getElementById("modal");
    dialog.close();
}