var resultsArea = document.querySelector(".shopee-search-item-result__items");
var listResults = resultsArea.querySelectorAll(
  ".shopee-search-item-result__item"
);
var aTag = listResults[19].querySelector("a");
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
