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

    // const html5QrCode = new Html5Qrcode("reader");
    // html5QrCode.start(
    //     { facingMode: "environment" },
    //     { fps: 10, qrbox: 250 },
    //     onScanSuccess
    // ).catch(err => console.log(`Error starting QR scanner: ${err}`));
});

document.getElementById('referenceIDInput').addEventListener('input', function(event) {
    const referenceID = event.target.value.trim();  // Get the scanned value

    if (referenceID) {
        // Fetch data from the server using the scanned reference ID
        fetch(`getData.php?referenceID=${referenceID}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('referenceID').textContent = data.referenceID;
                    document.getElementById('studentID').textContent = data.studentID;
                    document.getElementById('paymentAmount').textContent = data.paymentAmount;
                    document.getElementById('paymentDetail').textContent = data.paymentDetail;
                } else {
                    alert("Data not found for the scanned QR code.");
                }
            })
            .catch(error => console.error('Error fetching data:', error));

        // Clear the input field for the next scan
        event.target.value = '';
    }
});

// function onScanSuccess(qrCodeMessage) {
//     // Assuming the QR code contains the reference ID
//     fetch(`getData.php?referenceID=${qrCodeMessage}`)
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 document.getElementById('referenceID').textContent = data.referenceID;
//                 document.getElementById('studentId').textContent = data.studentId;
//                 document.getElementById('paymentAmount').textContent = data.paymentAmount;
//                 document.getElementById('paymentDetail').textContent = data.paymentDetail;
//             } else {
//                 alert("Data not found for the scanned QR code.");
//             }
//         })
//         .catch(error => console.error('Error fetching data:', error));
// }