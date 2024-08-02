function calR() {
    const numberOfBands = document.querySelector('input[name="bands"]:checked').value;
    let resistanceValue = 0;
    let tolerance = 0;
    let temperatureCoefficient = 0;

    if (numberOfBands == 4) {
        const line1 = parseInt(document.getElementById('line1').value);
        const line2 = parseInt(document.getElementById('line2').value);
        const multiplier = parseFloat(document.getElementById('line3').value);
        tolerance = parseFloat(document.getElementById('line4.1').value);

        resistanceValue = ((line1 * 10) + line2) * multiplier;
    } else if (numberOfBands == 5) {
        const line1 = parseInt(document.getElementById('line1').value);
        const line2 = parseInt(document.getElementById('line2').value);
        const line3 = parseInt(document.getElementById('line3').value);
        const multiplier = parseFloat(document.getElementById('line4.2').value);
        tolerance = parseFloat(document.getElementById('line5').value);

        resistanceValue = ((line1 * 100) + (line2 * 10) + line3) * multiplier;
    } else if (numberOfBands == 6) {
        const line1 = parseInt(document.getElementById('line1').value);
        const line2 = parseInt(document.getElementById('line2').value);
        const line3 = parseInt(document.getElementById('line3').value);
        const multiplier = parseFloat(document.getElementById('line4.2').value);
        tolerance = parseFloat(document.getElementById('line5').value);
        temperatureCoefficient = parseFloat(document.getElementById('line6').value);

        resistanceValue = ((line1 * 100) + (line2 * 10) + line3) * multiplier;
    }

    document.getElementById('resistor-value').innerText = `${resistanceValue} Ω ±${tolerance}%`;

    if (numberOfBands == 6) {
        document.getElementById('resistor-value').innerText += ` ${temperatureCoefficient} ppm/°C`;
    }
}
