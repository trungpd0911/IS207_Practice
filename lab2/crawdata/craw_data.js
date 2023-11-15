// truong hop tu ... den ...
var resultsArea = document.querySelector(".shopee-search-item-result__items");
var listResults = resultsArea.querySelectorAll(
  ".shopee-search-item-result__item"
);

var aTag = listResults[0].querySelector("a");
var divL1Tag = aTag.querySelector("div");
var divL2Tag = divL1Tag.querySelector("div");
var divFirstL3Tag = divL2Tag.querySelector("div");
var divSecL3Tag = divFirstL3Tag.nextElementSibling;
var divNameL4Tag = divSecL3Tag.querySelector("div");
var divPriceL4Tag = divNameL4Tag.nextElementSibling;
var divLocationL4Tag = divPriceL4Tag.nextElementSibling.nextElementSibling;

var productName = divNameL4Tag
  .querySelector("div")
  .querySelector("div").innerHTML;
console.log("ProductName: " + productName);

var productLocation = divLocationL4Tag.textContent;
console.log("location: " + productLocation);

var firstPrice = divPriceL4Tag.querySelectorAll("span")[2].innerHTML;
var LastPrice = divPriceL4Tag.querySelectorAll("span")[5].innerHTML;

console.log("price from " + firstPrice + "d to " + LastPrice + "d");

// 1 gia
var resultsArea = document.querySelector(".shopee-search-item-result__items");
var listResults = resultsArea.querySelectorAll(
  ".shopee-search-item-result__item"
);

var aTag = listResults[0].querySelector("a");
var divL1Tag = aTag.querySelector("div");
var divL2Tag = divL1Tag.querySelector("div");
var divFirstL3Tag = divL2Tag.querySelector("div");
var divSecL3Tag = divFirstL3Tag.nextElementSibling;
var divNameL4Tag = divSecL3Tag.querySelector("div");
var divPriceL4Tag = divNameL4Tag.nextElementSibling;
var divLocationL4Tag = divPriceL4Tag.nextElementSibling.nextElementSibling;

var productName = divNameL4Tag
  .querySelector("div")
  .querySelector("div").innerHTML;
console.log("ProductName: " + productName);

var productLocation = divLocationL4Tag.textContent;
console.log("location: " + productLocation);

var mainPrice = divPriceL4Tag
  .querySelector("div")
  .querySelectorAll("span")[2].innerHTML;

console.log("the price: " + mainPrice);

// giam gia
var resultsArea = document.querySelector(".shopee-search-item-result__items");
var listResults = resultsArea.querySelectorAll(
  ".shopee-search-item-result__item"
);

var aTag = listResults[0].querySelector("a");
var divL1Tag = aTag.querySelector("div");
var divL2Tag = divL1Tag.querySelector("div");
var divFirstL3Tag = divL2Tag.querySelector("div");
var divSecL3Tag = divFirstL3Tag.nextElementSibling;
var divNameL4Tag = divSecL3Tag.querySelector("div");
var divPriceL4Tag = divNameL4Tag.nextElementSibling;
var divLocationL4Tag = divPriceL4Tag.nextElementSibling.nextElementSibling;

var productName = divNameL4Tag
  .querySelector("div")
  .querySelector("div").innerHTML;
console.log("ProductName: " + productName);

var productLocation = divLocationL4Tag.textContent;
console.log("location: " + productLocation);
var divPriceL5List = divPriceL4Tag.querySelectorAll("div");
var divPriceL4TagTYPE = divPriceL5List.length;
if (divPriceL4TagTYPE == 1) {
  var divPriceL5TagTYPE = divPriceL5List[0].querySelectorAll("span").length;
  if (divPriceL5TagTYPE == 3) {
    var firstPrice = divPriceL5List[0].querySelectorAll("span")[2].innerHTML;
    console.log("ProductPrice: " + firstPrice);
  } else {
    var firstPrice = divPriceL5List[0].querySelectorAll("span")[2].innerHTML;
    var secPrice = divPriceL5List[0].querySelectorAll("span")[5].innerHTML;
    console.log("ProductPrice: " + firstPrice + " - " + secPrice);
  }
} else {
  var oldPrice = divPriceL5List[0].textContent;
  var newPrice = divPriceL5List[1].querySelectorAll("span")[2].textContent;
  console.log("ProductPrice (Old): " + oldPrice);
  console.log("ProductPrice (New): " + newPrice);
}
