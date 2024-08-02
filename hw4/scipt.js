class Product {
    constructor(id, name, detail, many, size, color, mat) {
        this.id = id;
        this.name = name;
        this.detail = detail;
        this.many = many;
        this.size = size;
        this.color = color;
        this.mat = mat;
    }

    displayInfo() {
        return `
            <div class="product">
                <p>ID: ${this.id}</p>
                <p>Name: ${this.name}</p>
                <p>Detail: ${this.detail}</p>
                <p>Quantity: ${this.many}</p>
                <p>Size: ${this.size}</p>
                <p>Color: ${this.color}</p>
                <p>Material: ${this.mat}</p>
            </div>
        `;
    }
}

const cloth = [
    new Product("A01,", "เสื้อเชิ้ต,", "เชิ้ตสีพื้น แต่งตัวง่ายๆ,", 10, "XL,", "สีดำ,สีขาว,สีกรม ,", "Cotton"),
    new Product("A02", "เสื้อคอปก", "เชิ้ตสีพื้น แต่งตัวง่ายๆ", 10, "XL", "สีดำ,สีขาว,สีกรม", "Cotton"),
    new Product("A03", "เสื้อยืดOversize", "เชิ้ตสีพื้น แต่งตัวง่ายๆ", 10, "XL", "สีดำ,สีขาว,สีกรม", "Cotton"),
    new Product("A04", "เสื้อยืด", "เชิ้ตสีพื้น แต่งตัวง่ายๆ", 10, "XL", "สีดำ,สีขาว,สีกรม", "Cotton"),
];

const elec = [
    new Product("B01", "หูฟังสาย", "ใส่สบาย ไม่เจ็บหู สายยาว1.5เมตร", 10, "NONE", "สีดำ,สีขาว", "Plastic"),
    new Product("B02", "หูฟังBluetooth", "Bluetooth4.0 สามารถใช้ได้ 24 ชม", 10, "NONE", "สีดำ,สีขาว", "Plastic"),
    new Product("B03", "TV", "สามารถYoutubeได้ มีระบบandroid จอLCD", 10, "80 นิ้ว", "สีดำ,สีเทา", "Plastic"),
    new Product("B04", "ลำโพง", "เบสหนัก ครบจบทุกเสียง ใช้ได้นาน48ชม.", 10, "XL", "สีดำ,สีขาว,สีกรม", "Plastic"),
];

function populateSelector(products, selectorId) {
    const selector = document.getElementById(selectorId);
    products.forEach(product => {
        const option = document.createElement("option");
        option.value = product.id;
        option.text = product.name;
        selector.appendChild(option);
    });
}

function displayProductDetails(products, selectorId, detailsId) {
    const selector = document.getElementById(selectorId);
    const details = document.getElementById(detailsId);
    const selectedProductId = selector.value;
    const product = products.find(p => p.id === selectedProductId);
    if (product) {
        details.innerHTML = product.displayInfo();
    } else {
        details.innerHTML = "No product selected";
    }
}

document.addEventListener("DOMContentLoaded", () => {
    populateSelector(cloth, "cloth-selector");
    populateSelector(elec, "elec-selector");

    document.getElementById("show-cloth").addEventListener("click", () => {
        displayProductDetails(cloth, "cloth-selector", "cloth-details");
    });

    document.getElementById("show-elec").addEventListener("click", () => {
        displayProductDetails(elec, "elec-selector", "elec-details");
    });
});
