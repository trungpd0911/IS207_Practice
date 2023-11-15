// row listProduct-row listProduct-resize listProduct-filter row-edit
const resultsArea = document.querySelector('.row.listProduct-row.listProduct-resize.listProduct-filter.row-edit');
// pro-loop col-6 col-lg-3 
const listResults1 = resultsArea.querySelectorAll('div.pro-loop.col-6.col-lg-3');
const listResults = Array.from(listResults1).filter(listResult => !listResult.classList.contains('hethang'));

for (var i = 0; i < listResults.length; i++) {
    var divL1Tag = listResults[i].querySelector("div");
    var imgTagL1 = divL1Tag.querySelectorAll("div")[0];
    var imgtagL2 = imgTagL1.querySelector(".product-boxImg-inner");
    var imgLink = imgtagL2.querySelector('div').querySelector('a').querySelector('img').src;

    var infoTagL1 = divL1Tag.querySelector(".product-box-info");
    var nameItem = infoTagL1.querySelector('.product-box-title').querySelector('h4').querySelector('a').innerHTML;

    var priceTagL1 = infoTagL1.querySelector('.product-box-price');
    var priceTagL2 = priceTagL1.querySelector('del');
    if (!priceTagL2) {
        priceItem = priceTagL1.querySelector('div').innerHTML;
        console.log("ProductName: " + nameItem);
        console.log("ProductPrice: " + priceItem);
        console.log("ProductImage: " + imgLink);
    }
    else {
        var mainPrice = priceTagL2.innerHTML;
        var salePrice = priceTagL1.querySelector('div').querySelector('span').innerHTML;
        console.log("ProductName: " + nameItem);
        console.log("main Price: " + mainPrice + "   sale price: " + salePrice);
        console.log("ProductImage: " + imgLink);
    }

    // var priceItem = infoTagL1.querySelector('.product-box-price').querySelector('div').innerHTML;

}


