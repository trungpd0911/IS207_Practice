function Pagedown() {
  const scrollingElement = (document.scrollingElement || document.body);
  setTimeout(function () {
    window.scrollBy(0, scrollingElement.scrollHeight / 12);
    scrolldelay = setTimeout('Pagedown()', 1000);
    if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
      clearTimeout(scrolldelay);
    }
  }, 600);
}

const CrawlDataOnePage = () => {

  var resultsArea = document.querySelector(".shopee-search-item-result__items");
  var listResults = resultsArea.querySelectorAll(".shopee-search-item-result__item");
  var listResultsLength = listResults.length;

  for (let i = 1; i < listResultsLength; i++) {
    console.log("san pham thu " + i + " : ");
    var aTag = listResults[i].querySelector("a");
    var divL1Tag = aTag.querySelector("div");
    var divL2Tag = divL1Tag.querySelector("div");
    var divFirstL3Tag = divL2Tag.querySelector("div");
    var divSecL3Tag = divFirstL3Tag.nextElementSibling;
    var divNameL4Tag = divSecL3Tag.querySelector("div");
    var divPriceL4Tag = divNameL4Tag.nextElementSibling;
    var divLocationL4Tag = divPriceL4Tag.nextElementSibling.nextElementSibling;

    // get item name
    var productName = divNameL4Tag
      .querySelector("div")
      .querySelector("div").innerHTML;
    console.log("ProductName: " + productName);

    // get price
    var divPriceL5List = divPriceL4Tag.querySelectorAll("div");
    var divPriceL4TagTYPE = divPriceL5List.length;
    if (divPriceL4TagTYPE == 1) {
      var divPriceL5TagTYPE = divPriceL5List[0].querySelectorAll("span").length;
      if (divPriceL5TagTYPE == 3) {
        var firstPrice =
          divPriceL5List[0].querySelectorAll("span")[2].textContent;
        console.log("ProductPrice: " + firstPrice);
      } else {
        var minPrice = divPriceL5List[0].querySelectorAll("span")[2].textContent;
        var maxPrice = divPriceL5List[0].querySelectorAll("span")[5].innerHTML;
        // var maxPrice = divPriceL4Tag.querySelector("div").lastChild.innerHTML;
        // var minPrice = divPriceL4Tag.querySelector("div").querySelectorAll("span")[2].textContent;
        console.log("ProductPrice: " + minPrice + " - " + maxPrice);
      }
    } else {
      var oldPrice = divPriceL5List[0].textContent;
      var newPrice = divPriceL5List[1].querySelectorAll("span")[2].textContent;
      // var oldPrice = divPriceL4Tag.querySelector("div").innerHTML;
      // var newPrice = divPriceL4Tag.querySelector("div").nextSibling.textContent;
      console.log("ProductPrice (Old): " + oldPrice);
      console.log("ProductPrice (New): " + newPrice);
    }
    console.log("ProductLocation: " + divLocationL4Tag.textContent);
  }
};




async function CrawlDataAllPage(n) {
  const sleep = (ms) => new Promise((res) => setTimeout(res, ms));
  for (let i = 1; i <= n; i++) {
    Pagedown()
    await sleep(20000);
    CrawlDataOnePage();
    console.log("---------Next page please [" + i + "]--------");
    const nextPageButton = document.querySelector(".shopee-mini-page-controller__next-btn");
    if (!nextPageButton) {
      break;
    }

    nextPageButton.click();
    await sleep(3000);
  }
};
