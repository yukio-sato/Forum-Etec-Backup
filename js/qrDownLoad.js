async function down(){
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF();
    //pdf.text(`test:`, 10, 10); // text on pdf

    /* other method to generate a qr code with jspdf api
    const qrCodeCanvas = document.createElement('canvas');
    await QRCode.toCanvas(qrCodeCanvas, "https://api.qrserver.com/v1/create-qr-code/?data=${teste}&size=100x100");
    const qrCodeDataUrl = qrCodeCanvas.toDataURL('image/png');
    */

    pdf.addImage(`https://api.qrserver.com/v1/create-qr-code/?data=ETEC&size=100x100`, 'PNG', 0, 0, 100, 100); // the qr code itself

    pdf.save('qrcode.pdf'); // download in your device
}